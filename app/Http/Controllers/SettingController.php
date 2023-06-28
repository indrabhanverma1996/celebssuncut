<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Image;
use App\Models\Category;
use DB;
use App\Models\Post;
use Redirect;
use Illuminate\Support\Facades\Crypt;
class SettingController extends Controller
{
public function profile(Request $request){
$id = Auth::id();         
 $postcategory = Category::all();
 $bank = DB::table('tbl_add_bank')->where('user_id',$id)->first();
$post = Post:: where('user_id',Auth::user()->id)->get();
$profile = User::where('id', Auth::user()->id )->first();  
$postcount = Post:: where('user_id',Auth::user()->id)->count();
$users = DB::table('users')->where('id',Auth::user()->id)->first();
$lastlogin = DB::table('login_activities')->where('user_id', Auth::user()->id)->first();
$flag =2;
$suggestion =  User::where('id', '!=', $id )->inRandomOrder()->orderBy('id','desc')->where('role_id',2)->get();
$postimagevideo = DB::table('tbl_post_images')->where('post_user_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
$followers  = DB::table('tbl_subscriber')->where('celebirity_user_id',$id)->count();
if(Auth::user()->role_id==2){
return view('front.setting.celebrity_profile',compact('post','postcount','users','suggestion','flag','lastlogin','postimagevideo','profile','followers','postcategory','bank'));
}else{
return view('front.setting.profile',compact('post','postcount','users','suggestion','lastlogin','flag'));
}
}
public function celeberityprofile(Request $request){
$id = Auth::id();
$profileId = Crypt::decrypt($request->id);
$profile = User::where('id', $profileId )->first();          
$bank = DB::table('tbl_add_bank')->where('user_id',$profileId )->first();
$post = Post::where('user_id',$profileId)->get();
$postcount = Post:: where('user_id',$profileId)->count();
$users = DB::table('users')->where('id',$profileId)->first();
$lastlogin = DB::table('login_activities')->where('user_id', $profileId)->first();
$flag =1;
$postimagevideo = DB::table('tbl_post_images')->where('post_user_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
$suggestion =  User::where('id', '!=', $id )->inRandomOrder()->orderBy('id','desc')->where('role_id',2)->get();
$subscribed = DB::table('tbl_subscriber')->where('user_id',Auth::user()->id)->where('celebirity_user_id',$profileId)->first();
 $postcategory = Category::all();
 
$followers  = DB::table('tbl_subscriber')->where('celebirity_user_id',$profileId)->count();
return view('front.setting.celebrity_profile',compact('post','postcount','users','profile','subscribed','flag','lastlogin','postimagevideo','followers','suggestion','postcategory','bank'));
}
public function  editProfile(){
$user = User::where('id',Auth::user()->id)->first();
return view('front.setting.editProfile',compact('user'));
}
public function  PrivacyAndSafety(){
return view('front.setting.PrivacyAndSafety');  
}
public function save(Request $request)
{
request()->validate([
'photo_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);
if ($files = $request->file('photo_name')) {
$destinationPath = 'public/images/'; // upload path
$profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
$files->move($destinationPath, $profileImage);
$update['profile_image'] = "$profileImage";
}
$usr = User::where('id',Auth::user()->id)->update($update);
return Response()->json($usr);
}
public function saveCoverImage(Request $request)
{
request()->validate([
'cover_name' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
]);
if ($files = $request->file('cover_name')) {
$destinationPath = 'public/images/'; // upload path
$coverImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
$files->move($destinationPath, $coverImage);
$update['cover_image'] = "$coverImage";
}
$usr = User::where('id',Auth::user()->id)->update($update);
return Response()->json($usr);
}
public function  saveuserDetails(Request $request){
$update['nickname'] =$request->username;
$update['name_title'] =$request->profesion;
$update['first_name'] =$request->first_name;
$update['last_name'] =$request->last_name;
$update['bio'] =$request->bio;
$update['location'] =$request->location;
$update['websiteurl'] =$request->websiteurl;
$user =   User::where('id',Auth::user()->id)->update($update);
return json_encode((object)['response'=>'Profile Update successfully']);

}
public function account(Request $request){
$data['account'] = $request->account;
$html = view('front.setting.account')->with($data)->render();
return response()->json(['html' => $html]);
}
}