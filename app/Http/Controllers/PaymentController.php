<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use gocardless;
use App\Helper\Helpers;
use DB;
use Auth;
use Redirect;
class PaymentController extends Controller
{
    public function index(Request $request){
 $ipdetails = Helpers::getcurrentIp();
 $client = Helpers::gocardless();
  // $customer = $client->customers()->get("CU000N6SGYVG55");

$billing = DB::table('tbl_billing_details')->where('user_id', Auth::user()->id)->where('gocardlessCust_id','!=','')->first();
$bankdetails = DB::table('tbl_add_bank')->where('user_id',Auth::user()->id)->first();
$post = DB::table('tbl_posts')->where('id',$request->postid)->first();

 $plan = DB::table('tbl_subscription_plan')->where('category_id',$post->post_cat_id)->first();
 $Today =date('Y-m-d h:i:s');
 $lengthcount = mb_strlen($bankdetails->account_number);
if($lengthcount > 8 || $lengthcount < 8){
return Redirect('my/banking')->with('error', 'Please update Correct account Number ..');
}

if(!empty($plan)){
$planExpridate = date('Y-m-d h:i:s', strtotime($Today. ' + '.$plan->plan_days.' days'));
}else{
$planExpridate = date('Y-m-d h:i:s', strtotime($Today. ' +  30 days'));

}

  
if($post->post_cat_id == 3 OR $post->post_cat_id == 4 OR $post->post_cat_id == 5 ){

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

  $this->payment($request);
}


}
public function payment($request){
  $ipdetails = Helpers::getcurrentIp();

$key = config('gocardless.GOCARDLESS_API_KEY');
$client = new \GoCardlessPro\Client([ 
     'access_token' =>$key,   
    'environment' => \GoCardlessPro\Environment::SANDBOX
]);

$billing = DB::table('tbl_billing_details')->where('email', $request->email)->first();
$bankdetails = DB::table('tbl_add_bank')->where('user_id',Auth::user()->id)->first();
$post = DB::table('tbl_posts')->where('id',$request->postid)->first();


 $lengthcount = mb_strlen($bankdetails->account_number);
if($lengthcount > 8 || $lengthcount < 8){
return Redirect('my/banking')->with('error', 'Please update Correct account Number ..');
}


  if(empty($billing)){
  
$customer  = $client->customers()->create([
  "params" => ["email" =>$request->email,
               "given_name" => Auth::user()->name,
               "family_name" => "royal",
               // "country_code" =>$ipdetails->geoplugin_countryCode
               "country_code" =>'GB',

             ]
]);

$bank = $client->customerBankAccounts()->create([
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
               "links" => ["customer_bank_account" =>$bank->id]]
]);

 $payment = $client->payments()->create([
  "params" => ["amount" =>100,
               "currency" => "GBP",
               "metadata" => [
                 "order_dispatch_date" =>date('Y-m-d:h:i:s'),
               ],
               "links" => [
                 "mandate" => $mandate->id
               ]]
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


$bankdetails =  DB::table('tbl_add_bank')->where('user_id',Auth::user()->id)->update([ 'gocardlessBank_id' =>$bank->id,'gocardless_mandateid' =>$mandate->id]);


$payment = DB::table('tbl_post_payment')->insert([ 
               'Payment_id' =>$payment->id,
               'user_id' =>Auth::user()->id,                
                'celebirity_user_id'=>$post->user_id,
                'price' =>$post->amount,
                'post_id' =>$post->id,
                'expiry_date' =>date('Y-m-d h:i:s'),
                'category_id' => $post->post_cat_id,               
                'created_at'=>date('Y-m-d h:i:s'),
                'updated_at'=>date('Y-m-d h:i:s')]);
return Redirect::back()->with('success', 'Bank u successfully');

}else{
  
  
 $payment = $client->payments()->create([
  "params" => ["amount" =>100,
               "currency" => "GBP",
               "metadata" => [
                 "order_dispatch_date" =>date('Y-m-d:h:i:s'),
               ],
               "links" => [
                 "mandate" => $bankdetails->gocardless_mandateid
               ]]
]);




$payment = DB::table('tbl_post_payment
')->insert([ 'Payment_id' =>$payment->id,
               'user_id' =>Auth::user()->id,                
                'celebirity_user_id'=>$post->user_id,
                'price' =>$post->amount,
                'post_id' =>$post->id,
                'expiry_date' =>date('Y-m-d h:i:s'),
                'category_id' => $post->post_cat_id,
               
                'created_at'=>date('Y-m-d h:i:s'),
                'updated_at'=>date('Y-m-d h:i:s')]);



   }
}
}
