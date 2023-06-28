<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Onfido;
use DB;
use Redirect;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
public function banking(){
$bank = DB::table('tbl_add_bank')->where('user_id',Auth::user()->id)->first();

return view('front.setting.add_bank',compact('bank'));

}
public function savebankdetails(Request $request){
   
  
if($files = $request->file('card_photo')) {
$destinationPath1 = 'public/userdoc/'; // upload path
$card_photo = date('YmdHis') . "." . $files->getClientOriginalExtension();
$files->move($destinationPath1	, $card_photo);
}
if ($files = $request->file('card_photo_holding_id')) {
$destinationPath2 = 'public/userdoc/'; // upload path
$card_photo_holding_id = date('YmdHis') . "." . $files->getClientOriginalExtension();
$files->move($destinationPath2, $card_photo_holding_id);
}

$user =  DB::table('tbl_add_bank')->where('user_id',Auth::user()->id)->first();

if(empty($user)){

DB::table('tbl_add_bank')->insert([
'user_id'=>Auth::user()->id,
'first_name'=>	$request->first_name,
'last_name'=>	$request->last_name,
'account_number'=>	$request->account_number,
'branch_code'=>	$request->branch_code,
'doc_type'=>	$request->doc_type,		
'country'=>$request->country,	
'address'=>$request->address,		
'city' =>$request->city,	
'postal_code'=>$request->postal_code,	
'twiter'	=>$request->twiter,	
'instagram'=>$request->instagram,	
'date_of_birth'=>$request->date_of_birth,		
'card_photo'=>$card_photo,
'card_photo_holding_id'	=>$card_photo_holding_id,
'id_expiration_date'=>$request->id_expiration_date	
]);
return Redirect::back()->with('success', 'Bank add successfully');
}else{
//   if($files = $request->file('card_photo')) {
// $destinationPath1 = 'https://site2demo.in/celebs/public/userdoc/'; // upload path
// $card_photo = date('YmdHis') . "." . $files->getClientOriginalExtension();

// $files->move($destinationPath1,$card_photo);
// }else{
//        $card_photo ='';
// }
// if ($files = $request->file('card_photo_holding_id')) {
// $destinationPath2 = 'https://site2demo.in/celebs/public/userdoc/'; // upload path
// $card_photo_holding_id = date('YmdHis') . "." . $files->getClientOriginalExtension();
// $files->move($destinationPath2, $card_photo_holding_id);
// }else{
//  $card_photo_holding_id = '';
// } 

DB::table('tbl_add_bank')->where('id',$user->id)->update([
'user_id'=>Auth::user()->id,
'first_name'=>	$request->first_name,
'last_name'=>	$request->last_name,
'account_number'=>	$request->account_number,
'branch_code'=>	$request->branch_code,
'doc_type'=>	$request->doc_type,		
'country'=>$request->country,	
'address'=>$request->address,		
'city' =>$request->city,	
'postal_code'=>$request->postal_code,	
'twiter'	=>$request->twiter,	
'instagram'=>$request->instagram,
'date_of_birth'=>$request->date_of_birth,
// 'card_photo'=>$card_photo,
// 'card_photo_holding_id' =>$card_photo_holding_id,		
'id_expiration_date'=>$request->id_expiration_date	
]);
return Redirect::back()->with('success', 'Bank update successfully');
}
}
public function age_verification(Request $request){

$countryCode = DB::table('countrycode')->get();
return view('front.setting.age_verification',compact('countryCode'));
}

public function proccessing_age_verification(Request $request){

return view('front.setting.Processing_age_verifiaction');
}

public function onfidoapi(Request $request){ 



$userdetails = DB::table('tbl_add_bank')->where('user_id',Auth::user()->id)->first();
$user = DB::table('users')->where('id',Auth::user()->id)->first();
$ipaddress = $request->ip();
if(empty($userdetails->city) or empty($userdetails->postal_code)  or empty($userdetails->date_of_birth) ){
return Redirect('my/banking')->with('error', 'Please Complete Details');
}
if(empty($user->first_name) OR empty($user->last_name)){
return Redirect('my/settings/profile')->with('error', 'Please Complete Details');


}
$applicantDetails = new Onfido\Model\ApplicantRequest();
$applicantDetails->setFirstName($userdetails->first_name);
$applicantDetails->setLastName($userdetails->last_name);
$applicantDetails->setDob($request->dob);
// dd($applicantDetails);
$address = new \Onfido\Model\Address();
//$address->setBuildingNumber('100');
$address->setStreet($userdetails->city);
$address->setTown($userdetails->city);
$address->setPostcode($userdetails->postal_code);
$address->setCountry($request->countryCode);
$applicantDetails->setAddress($address);

$location  = new \Onfido\Model\Location();
$location->setIpaddress($ipaddress);
//$location->getCountryOfResidence($request->CountryOfResidence);
$applicantDetails->setLocation($location);
$applicant = Onfido::createApplicant($applicantDetails);
$applicantId = ($applicant)->getId();

if ($files = $request->file('document')) {
$destinationPath2 = 'public/front_assets/identity_verification/'; // upload path
$document = date('YmdHis') . "." . $files->getClientOriginalExtension();
$files->move($destinationPath2, $document);
}
$type = 'passport';
$side = 'front';
$file1 = 'https://site2demo.in/celebs/public/front_assets/identity_verification/'.$document;


if(!empty($request->livephoto)) {
    $folderPath = "public/front_assets/identity_verification/";
        
    $base64Image = explode(";base64,", $request->livephoto);
        $explodeImage = explode("image/", $base64Image[0]);
        $imageType = $explodeImage[1];
        $image_base64 = base64_decode($base64Image[1]);
        $file = $folderPath . uniqid(). '.'.'jpg';
        
        file_put_contents($file, $image_base64);
    }else{

        return Redirect::back()->with('error', 'Kindly Take Selfi ..');
    }

$file2 = 'https://site2demo.in/celebs/'.$file;


$document =Onfido::uploadDocument($applicantId, $type, $file1, $side);
$docuid = ($document)->getId();

$live_photos = Onfido::uploadLivePhoto($applicantId,$file2);
$checkData = new Onfido\Model\CheckRequest();
$checkData->setApplicantId($applicantId);
$checkData->setReportNames(array('document', 'facial_similarity_photo'));
$check = Onfido::createCheck($checkData);
$checkId = ($check)->getId();


// dd($check);
$reportIds =($check)->getReportIds();

$onfido = DB::table('tbl_onfido_report')->where('user_id',Auth::user()->id)->first();
if(!empty($onfido)){
DB::table('tbl_onfido_report')->where('id',$onfido->id)->update([
'document_link'=>$check['href'],
'checkId'=>$checkId,
'result'=>$check['result'],
'applicant_id'=>$check['applicant_id'],
'status'=>$check['status'],
'results_uri'=>$check['results_uri'],
'report_id1'=>$reportIds[0],
'report_id2'=>$reportIds[1],
'created_at'=>date('Y-m-d H:i:s'),
'updated_at'=>date('Y-m-d H:i:s'),
]);
}else{
DB::table('tbl_onfido_report')->insert(
['user_id'=>Auth::user()->id,
'document_link'=>$check['href'],
'checkId'=>$checkId,
'result'=>$check['result'],
'applicant_id'=>$check['applicant_id'],
'status'=>$check['status'],
'results_uri'=>$check['results_uri'],
'report_id1'=>$reportIds[0],
'report_id2'=>$reportIds[1],
'created_at'=>date('Y-m-d H:i:s'),
'updated_at'=>date('Y-m-d H:i:s'),
]);
}
$this->checkonfidoapi($checkId);
return Redirect('/age-verifiying')->with('success', 'Bank u successfully');
}
   
 public function checkonfidoapi($checkId ){
  
$chackapi =  Onfido::findCheck($checkId);

$onfido = DB::table('tbl_onfido_report')->where('user_id',Auth::user()->id)->first();


 DB::table('tbl_onfido_report')->where('id',$onfido->id)->update([
'result'=>$chackapi['result'],
'applicant_id'=>$chackapi['applicant_id'],
'status'=>$chackapi['status'],
'created_at'=>date('Y-m-d H:i:s'),
'updated_at'=>date('Y-m-d H:i:s'),
]);
   }

   public function cardno(){
   	return view('front.link.payment');
   }


   public function addCard(Request $request){
             
        $cardno = DB::table('tbl_card__no')->where('user_id',Auth::user()->id)->first();
        $input =  $request->all();
        if(empty($cardno)){
          DB::table('tbl_card__no')->insert(
             	['user_id'=>Auth::user()->id,
             	  'card_holder_name'=>$request->card_holder_name,
             	  'card_number'=>$request->card_number,
             	  'expiry_month'=>$request->expiry_month,
             	  'expiry_year'=>$request->expiry_year,
             	  'cvv'=>$request->cvv,
             	        	]);
        }else{

        	DB::table('tbl_card__no')
        	->where('user_id',$cardno->user_id)->update(['card_number'=>$request->card_number]);
        }
return Redirect::back()->with('success', 'Card Added successfully');
   }

public function changePassword(Request $request){
  try{
        $currentPass = Auth::user()->password;
        if (Hash::check($request->current_password, $currentPass)) {
            $user = User::find(Auth::id());
            $user ->password = Hash::make($request->new_password);
            $user -> save();

            return response()->json([
                'status' => true,
                'mssag' => 'Your password changed successfully',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'mssag' => 'Old password is wrong',
            ]);
        }

    }catch (\Exception $ex){
        return $ex;
        return redirect()->back()->with(['error' => 'Something error please try again later']);
    }

}


}