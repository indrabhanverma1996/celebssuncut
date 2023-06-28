<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\StatusVideo;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Carbon;
use DB;
class PostController extends Controller
{
public function store( Request $request){
// $validator = Validator::make(
//        $request->all(),
//        [
//            'message' => 'required',
//            'image.*' => 'image',
//        ],
//        [
//            'image.*.image' => 'Only images can be uploaded',
//            'content.required' => 'A post description is required',
//        ]
//    );
//    if ($validator->fails()) {
//        return Redirect()->back()->with('error', $validator->errors()->first());
//    }
if($request->hasfile('photo'))
{
foreach($request->file('photo') as $item)
{
$var = date_create();
$time = date_format($var, 'YmdHis');
$extension = $item->getClientOriginalExtension();
if($extension =='mp4'){
$imageName = $time . '-' . $item->getClientOriginalName();
$path = $item->store('videos', ['disk' =>      'my_files']);
$arr[] = $path;
}else{
$imageName = $time . '-' . $item->getClientOriginalName();
$item->move(base_path() . '/images/posts/', $imageName);
$arr[] = $imageName;
}
}
$image = implode(",", $arr);
Post::insert([
'user_id' => Auth::user()->id,
'post_cat_id' => $request->postcategory,
'content' => $request->message,
'amount'=>$request->amount,
'photo' => $image ,
'status' => 0,
'likes' => 0,
'comments' => 0,
'published_at' =>  date('Y-m-d H:i:s'),
'created_at' =>  date('Y-m-d H:i:s'),
]);
$postId = DB::getPdo()->lastInsertId();
foreach ($arr as $val){
PostImage::insert([
'post_id' => $postId,
'post_user_id' => Auth::user()->id,
'image' =>$val,
'created_at' => Carbon::now(),
]);
}
}else{
Post::insert([
'user_id' => Auth::user()->id,
'content' => $request->message,          
'status' => 0,
'likes' => 0,
'comments' => 0,
'published_at' =>  date('Y-m-d H:i:s'),
'created_at' =>  date('Y-m-d H:i:s'),
]);
$postId = DB::getPdo()->lastInsertId();
$img_position = 1;
}
if(isset($errorImages)){
return Redirect()->back()->with('error','Some of your images are too big. Please be sure that each of your images do not exceed the 500Kb limit.');
}
return Redirect()->back()->with('success', 'Post created successfully');
}


public function postRealvideo(Request $request){
	
if($files = $request->file('realvideo')) {
$var = date_create();
$time = date_format($var, 'YmdHis');
$extension = $files->getClientOriginalExtension();

if($extension =='mp4'|| $extension =='mkv'||$extension =='3gp'){
	
$imageName = $time . '-' . $files->getClientOriginalName();
$reals = $files->store('videos', ['disk' =>      'my_files']);

}else{
$path = 'public/images/posts/'; // upload path

$reals = date('YmdHis') . "." . $files->getClientOriginalExtension();
$files->move($path, $reals);

}
}

StatusVideo::insert([
'user_id' => Auth::user()->id,
'video' => $reals,          
'status' => 1,

'created_at' =>  date('Y-m-d H:i:s'),
'updated_at' =>  date('Y-m-d H:i:s'),
]);

return Redirect('/')->with('success', 'real created successfully');
}

public function destroy($postId)
{
Post::where('id',$postId)->Delete();
$ids = explode(",", $postId);
PostImage::where('post_id',$ids)->delete();
return  Redirect()->back()->with('success', 'Post deleted successfully');
}
public function singlepost(Request $request){
Post::insert([
'user_id' => Auth::user()->id,
'content' => $request->message,          
'status' => 0,
'likes' => 0,
'comments' => 0,
'published_at' =>  date('Y-m-d H:i:s'),
'created_at' =>  date('Y-m-d H:i:s'),
]);
return json_encode((object)['response'=>1]);
}


}