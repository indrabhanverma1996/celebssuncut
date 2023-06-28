<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Controllers\PaymentController;
use App\Helper\Helpers;
class SubscriptionController extends Controller
{

    


    public function index(){

       
        return view('front.subscription.index');
    }
    
    
     public function subscription(){


$subscribeuser = DB::table('tbl_subscriber')->orWhere('user_id',Auth::user()->id)->orWhere('celebirity_user_id',Auth::user()->id)->get();

$user = DB::table('users')->where('id',Auth::user()->id)->first();
$users =[];
  foreach($subscribeuser as $subscribe){
   if($subscribe->celebirity_user_id !=Auth::user()->id){
    $users[] = DB::table('users')->where('id',$subscribe->celebirity_user_id)->groupBy('id')->first(); 
     }else{
    $users[] = DB::table('users')->where('id',$subscribe->user_id)->groupBy('id')->first();   
     }
}

        return view('front.subscription.subscriptions',compact('users'));
    }
    
    
 public function subscribe(Request $request){
$plan  =   DB::table('users')->where('id',$request->profilerid)->first();


 $ipdetails = Helpers::getcurrentIp();

 $client = Helpers::gocardless();


$billing = DB::table('tbl_billing_details')->where('user_id', Auth::user()->id)->where('gocardlessCust_id','!=','')->first();
$bankdetails = DB::table('tbl_add_bank')->where('user_id',Auth::user()->id)->first();

 $Today =date('Y-m-d h:i:s');
 $lengthcount = mb_strlen($bankdetails->account_number);
if($lengthcount > 8 || $lengthcount < 8){
return Redirect('my/banking')->with('error', 'Please update Correct account Number ..');
}

if(!empty($plan)){
$planExpridate = date('Y-m-d h:i:s', strtotime($Today. ' + '.$plan->free_subscription.' days'));
}else{
$planExpridate = date('Y-m-d h:i:s', strtotime($Today. ' +  30 days'));

}

 if($plan->subscribe_plan>0) 


if(empty($billing)){
  
$customer  = $client->customers()->create([
  "params" => ["email" =>$request->email,
               "given_name" => Auth::user()->name,
               "family_name" => "royal",
               // "country_code" =>$ipdetails->geoplugin_countryCode
               "country_code" =>'GB',

             ]
]);

$bankdetails = $client->customerBankAccounts()->create([
  "params" => ["account_number" =>$bankdetails->account_number,
               "branch_code" => $bankdetails->branch_code,
               "account_holder_name" => Auth::user()->name,
               // "country_code" =>$ipdetails->geoplugin_countryCode,
               "country_code" =>'GB',               
               "links" => ["customer" =>$customer->id]]
]);

 $mandate = $client->mandates()->create([
  "params" => ["scheme" => "bacs",
               "metadata" => ["contract" => "ABCD1234"],
               "links" => ["customer_bank_account" => $bankdetails->id]]
]);


$payment = $client->subscriptions()->create([
  "params" => ["amount" =>100,
               "currency" => "GBP",
               "name" => "Monthly Magazine",
               "interval_unit" => "monthly",
               "day_of_month" => 1,
               "metadata" => ["order_no" => $mandate->id],
               "links" => ["mandate" =>  $mandate->id]]
]);


$billing = DB::table('tbl_billing_details')->insert([ 'user_id' =>Auth::user()->id,
                'country' =>$request->country,
                'gocardlessCust_id'=>$customer->id,
                'state' =>$request->state,
                'street' => $request->street,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'email' => $request->email,
                'card_name' =>$request->card_name,
                'Expiration' => $request->Expiration,
                'cvvno' => $request->cvvno,
                'age_check' => $request->age_check,
                'created_at'=>date('Y-m-d h:i:s'),
                'updated_at'=>date('Y-m-d h:i:s')]);


$bankdetails =  DB::table('tbl_add_bank')->where('user_id',Auth::user()->id)->update([ 'gocardlessBank_id' =>$bankdetails->id]);


$payment = DB::table('tbl_post_payment')->insert([ 
               'Payment_id' =>$payment->id,
               'user_id' =>Auth::user()->id,                
                'celebirity_user_id'=>$post->user_id,
                'price' =>$post->amount,
                'post_id' =>$post->id,
                'expiry_date' =>$planExpridate,
                'category_id' => $post->post_cat_id,
               
                'created_at'=>date('Y-m-d h:i:s'),
                'updated_at'=>date('Y-m-d h:i:s')]);

return Redirect::back()->with('success', 'Bank u successfully');

}else{
  
 

$payment = $client->subscriptions()->create([
  "params" => ["amount" =>100,
               "currency" => "GBP",
               "name" => "Monthly Magazine",
               "interval_unit" => "monthly",
               "day_of_month" => 1,
               "metadata" => ["order_no" => $bankdetails->gocardless_mandateid],
               "links" => ["mandate" => $bankdetails->gocardless_mandateid]]
]);




$payment = DB::table('tbl_post_payment')->insert([ 
               'Payment_id' =>$payment->id,
               'user_id' =>Auth::user()->id,                
                'celebirity_user_id'=>$post->user_id,
                'price' =>$post->amount,
                'post_id' =>$post->id,
                'expiry_date' =>$planExpridate,
                'category_id' => $post->post_cat_id,
               
                'created_at'=>date('Y-m-d h:i:s'),
                'updated_at'=>date('Y-m-d h:i:s')]);
return Redirect::back()->with('success', 'Bank u successfully');

}


}else{

  // $customer = $client->customers()->get("CU000N6SGYVG55");

}

 
   
    if(!empty($plan)){
            DB::table('users')->where('id',Auth::user()->id)->update(['subscribe_plan'=>1,'subscribe_user_id'=>$request->profilerid]); 
            DB::table('tbl_subscriber')->insert(['user_id'=>Auth::user()->id,'celebirity_user_id'=>$request->profilerid,'subscription_plan'=>1]); 
          return json_encode((object)['response'=>1]);

    }
       
   
        
        
    }
    
}
