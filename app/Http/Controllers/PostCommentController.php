<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PostComment;
use App\Models\Post;
use App\Models\PostCommentReply;
use Auth;
use DB;
use App\Models\User;
use Illuminate\Support\Carbon;
class PostCommentController extends Controller
{
public function addComment(Request $request)
{
  
       $affectedRow = PostComment::create([
            'comment_user_id'=>Auth::user()->id,
            'post_id'=>$request->postid,
            'comment'=>$request->commentval,
            'published_at' =>Carbon::now(),
            'created_at' => Carbon::now(),
            ]);
            Post::addOneComment($request->postid);
            
           
    $user = User::where('id',Auth::user()->id)->first();
   
$commentcount = PostComment::where('post_id',$request->postid)->count();

if($affectedRow){
return json_encode((object)['response'=>$request->commentval,'name'=>$user->name,'profile_image'=>$user->profile_image,'commentid'=>$affectedRow->id,'commentcount'=>$commentcount]);
}
return json_encode((object)['status'=>0]);
//return Redirect()->back()->with('success','Comment added successfully');
}
public function removeComment(Request $request)
{
PostComment::where('comment_user_id',Auth::user()->id)
->where('id',$request->commentid)->delete();
return json_encode((object)['response'=>'Comment removed successfully']);
}


public function replycomment(Request $request){
  

  // dd($request->all());
      $data = new PostCommentReply();
      $data->Comment_user_id = Auth::user()->id;
      $data->comment_id = $request->commentid;
      $data->comment =$request->commentval;
        $data->status =1;
        $data->created_at =Carbon::now();
        $data->updated_at =Carbon::now();
            $data->save();
       $user = User::where('id',Auth::user()->id)->first();

if(!empty($data)){
return json_encode((object)['response'=>$request->commentval,'name'=>$user->name,'profile_image'=>$user->profile_image,'replycommentid'=>$data->id]);
}
return json_encode((object)['status'=>0]);

}


public function multipostcomment(Request $request){
dd($request->all());


    
}



}