<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use DB;
use Auth;
 use App\Helper\Helpers;

class MeassageController extends Controller
{
public function index(){

$subscribeuser = DB::table('tbl_subscriber')->orWhere('user_id',Auth::user()->id)->orWhere('celebirity_user_id',Auth::user()->id)->get();
$user = DB::table('users')->where('id',Auth::user()->id)->first();
$users =[];
foreach($subscribeuser as $subscribe){
  if($subscribe->celebirity_user_id !=Auth::user()->id){
    $users[] = DB::table('users')->where('id',$subscribe->celebirity_user_id)->first(); 
     }else{
    $users[] = DB::table('users')->where('id',$subscribe->user_id)->first();   
     }

// if($user->role_id==3){
// $users[] = DB::table('users')->where('id',$subscribe->celebirity_user_id)->first(); 
// }else{
// $users[] = DB::table('users')->where('id',$subscribe->user_id)->first();   
// }
}
return view('front.message.index',compact('users'));
}
public function user(){
$subscribeuser = DB::table('tbl_subscriber')->orWhere('user_id',Auth::user()->id)->orWhere('celebirity_user_id',Auth::user()->id)->get();
$user = DB::table('users')->where('id',Auth::user()->id)->first();
$users =[];
foreach($subscribeuser as $subscribe){

  if($subscribe->celebirity_user_id !=Auth::user()->id){
    $users[] = DB::table('users')->where('id',$subscribe->celebirity_user_id)->first(); 
     }else{
    $users[] = DB::table('users')->where('id',$subscribe->user_id)->first();   
     }
// if($user->role_id==3){
// $users[] = DB::table('users')->where('id',$subscribe->celebirity_user_id)->first(); 
// }else{
// $users[] = DB::table('users')->where('id',$subscribe->user_id)->first();   
// }
}
return view('front.message.user',compact('users'));
}

public function chatAjax($id)
{

// dd($_REQUEST);
  DB::enableQueryLog();
   $data['message'] = DB::table('tbl_messages')->whereRaw('(from_user_id =' .$id . ' AND to_user_id =' . Auth::user()->id . ') OR (to_user_id =' . $id. ' AND from_user_id =' . Auth::user()->id . ')')->orderBy('id', 'ASC')->get();
 $data['lastid'] =  max(array_column($data['message']->toArray(), 'id'));

  $data['user'] = DB::table('users')->where('id',Auth::user()->id)->first();
$subscribeuser = DB::table('tbl_subscriber')->orWhere('user_id',Auth::user()->id)->orWhere('celebirity_user_id',Auth::user()->id)->get();

  $users =[];
foreach($subscribeuser as $subscribe){
  if($subscribe->celebirity_user_id !=Auth::user()->id){
    $users[] = DB::table('users')->where('id',$subscribe->celebirity_user_id)->first(); 
     }else{
    $users[] = DB::table('users')->where('id',$subscribe->user_id)->first();   
     }
// if($data['user']->role_id==3){
// $users[] = DB::table('users')->where('id',$subscribe->celebirity_user_id)->first(); 
// }else{
// $users[] = DB::table('users')->where('id',$subscribe->user_id)->first();   
// }
}


$data['users'] = $users;
  $html = view('front.message.chatbox')->with($data)->render();

  return response()->json(['html' => $html,'lastmsgid'=>$data['lastid']]);
  
}
public function recentchat(Request $request){


  $id = $request->id;

   $data['message1'] = DB::table('tbl_messages')->whereRaw('(from_user_id =' .$id . ' AND to_user_id =' . Auth::user()->id . ') OR (to_user_id =' . $id. ' AND from_user_id =' . Auth::user()->id . ')')->orderBy('id', 'ASC')->get();
  $data['user'] = DB::table('users')->where('id',Auth::user()->id)->first();
$subscribeuser = DB::table('tbl_subscriber')->orWhere('user_id',Auth::user()->id)->orWhere('celebirity_user_id',Auth::user()->id)->get();

  $users =[];
foreach($subscribeuser as $subscribe){
if($data['user']->role_id==3){
$users[] = DB::table('users')->where('id',$subscribe->celebirity_user_id)->first(); 
}else{
$users[] = DB::table('users')->where('id',$subscribe->user_id)->first();   
}
}

$data['users'] = $users;
  $html1 = view('front.message.recentchat')->with($data)->render();

  return response()->json(['html1' => $html1]);
  
}

public function chat(Request $request, $id){

   if($request->ajax()){
    return $this->chatAjax($id);
    
  }
   
   $chat = DB::table('users')->where('id',$id)->first();

	$country = DB::table('tbl_countries')->get();
$subscribeuser = DB::table('tbl_subscriber')->orWhere('user_id',Auth::user()->id)->orWhere('celebirity_user_id',Auth::user()->id)->get();

$user = DB::table('users')->where('id',Auth::user()->id)->first();
//DB::enableQueryLog();

// dd(DB::getQueryLog());

$users =[];
foreach($subscribeuser as $subscribe){

  if($subscribe->celebirity_user_id !=Auth::user()->id){
    $users[] = DB::table('users')->where('id',$subscribe->celebirity_user_id)->first(); 
     }else{
    $users[] = DB::table('users')->where('id',$subscribe->user_id)->first();   
     }
// if($user->role_id==3){
// $users[] = DB::table('users')->where('id',$subscribe->celebirity_user_id)->first(); 
// }else{
// $users[] = DB::table('users')->where('id',$subscribe->user_id)->first();   
// }
}

// dd($users);
return view('front.message.chat',compact('users','chat','country'));
} 

public function AjaxUserChat(Request $request) {
$subscribeuser = DB::table('tbl_subscriber')->orWhere('user_id',Auth::user()->id)->orWhere('celebirity_user_id',Auth::user()->id)->get();

$user = DB::table('users')->where('id',Auth::user()->id)->first();

$user =[];
foreach($subscribeuser as $subscribe){
if($user->role_id==3){
$user[] = DB::table('users')->where('id',$subscribe->celebirity_user_id)->first(); 
}else{
$user[] = DB::table('users')->where('id',$subscribe->user_id)->first();   
}
}
$data['users']  = $user;
 $html = view('front.message.test')->with($data)->render();

  return response()->json(['html1' => $html]);
}
public function message(Request $request){
$user = DB::table('users')->where('id',Auth::user()->id)->first();
// if($user->role_id==2){
// $message = new Message();
// $message->from_user_id = Auth::user()->id;
// $message->to_user_id = Auth::user()->id;
// $message->to_message = $request->message;
// $message->save();
// $messagedata = Message::where('id',$message->id)->first();
// return json_encode((object)['to_message'=>$messagedata->to_message,'from_message'=>$messagedata->from_message,'created_at'=>$messagedata->created_at]);
// }else{
$message = new Message();
$message->from_user_id = Auth::user()->id;
$message->to_user_id = $request->id;
$message->from_message = $request->message;
$message->save(); 
$messagedata = Message::where('id',$message->id)->first();
return json_encode((object)['to_message'=>$messagedata->to_message,'from_message'=>$messagedata->from_message,'created_at'=>$messagedata->created_at]);
// }
}

public function get_states(Request $request){
$states = DB::table('tbl_states')->where('country_id',$request->countryId)->get();
	$html="";
		foreach($states as $val){
			$html.="<option value='".$val->id."'>".$val->name."</option>";
		}
		return $html;
}
public  function searchUser(Request $request){
$search =   $request->search_keyword;
$users = User::where('name', $search)->first();
if($users!=null){
return json_encode((object)['name'=>$users->name,'username'=>$users->nickname,'profile_image'=>$users->profile_image,'value'=> $search]);
}else{
return 0;
}
}
public function deleteSubscribeduser($id){
  

DB::table('tbl_subscriber')->where('user_id',$id)->delete();
return redirect('my/chats/'); 
}
}