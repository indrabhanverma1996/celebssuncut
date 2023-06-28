<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikedPost;
use Auth;
use App\Models\Post;
use App\Models\MultipostLike;
use App\Models\PostImage;
use App\Models\CommentLikes;
use App\Models\PostComment;
use DB;
use Illuminate\Support\Facades\Response;
class LikeController extends Controller
{
   public function likePost(Request $request)
    {

  $postId =    $request->postid;

    $LikedPost = LikedPost::where('like_user_id',Auth::user()->id)->where('post_id',$postId)->first();
        
        try{
            if(!empty($LikedPost)){
             $this->removeLikePost($postId );
                    $like =       Post::where('id',  $postId )->first();
              return  json_encode( (object) ['count' => $like->likes]);
            }else{
                LikedPost::insert([
                'like_user_id' => Auth::user()->id,
                'post_id' => $postId,
            ]);
            Post::addOneLike($postId);
          $like = Post::where('id',  $postId )->first();
         
            return  json_encode( (object) ['count' => $like->likes]); 
        
            }
           
        }catch(QueryException $e){
            return  json_encode( (object) ['status' => 0]);

        }

    }

    public function removeLikePost($postId)
    {

        try {
            LikedPost::where('like_user_id', Auth::user()->id)
                ->where('post_id', $postId)
                ->delete();
            Post::removeOneLike($postId);
           
            // return  json_encode( (object) ['status' => 1]);

        } catch (QueryException $ex) {
            return  json_encode( (object) ['status' => 0]);
        }
    }


 public function commentLike(Request $request){
  
  $commentId =    $request->commentId;

  $LikedPost = CommentLikes::where('like_user_id',Auth::user()->id)->where('comment_id',$commentId)->first();
      
      try{
          if(!empty($LikedPost)){
            CommentLikes::where('like_user_id', Auth::user()->id)
            ->where('comment_id', $commentId)
            ->delete();
            Post::removeOnecommentLike($commentId);       
            $like = PostComment::where('id',  $commentId )->first();       
            return  json_encode( (object) ['count' => $like->likes]); 
        
          }else{
            CommentLikes::insert([
              'like_user_id' => Auth::user()->id,
              'comment_id' => $commentId,
          ]);
          Post::addOnecommentLike($commentId);
        $like = PostComment::where('id',  $commentId )->first();       
          return  json_encode( (object) ['count' => $like->likes]); 
      
          }
         
      }catch(QueryException $e){
          return  json_encode( (object) ['status' => 0]);

      }

  }
        

 
    
    public function replycommentLike(Request $request){
  dd($request->all());
      

    }
    public function multipostlike(Request $request){
    
  $multiid =    $request->multiid;

  $LikedPost = MultipostLike::where('like_user_id',Auth::user()->id)->where('multiple_post_id',$multiid)->first();
      
      try{
          if(!empty($LikedPost)){
        
           $this->removemultiLikePost($multiid );
                 $like =       PostImage::where('id',  $multiid )->first();
      
            return  json_encode( (object) ['count' => $like->likes]);
          }else{
           
            MultipostLike::insert([
              'like_user_id' => Auth::user()->id,
              'multiple_post_id' => $multiid,
          ]);
          Post::addOnemultipostLike($multiid);
        $like = PostImage::where('id',  $multiid )->first();
       
          return  json_encode( (object) ['count' => $like->likes]); 
      
          }
         
      }catch(QueryException $e){
          return  json_encode( (object) ['status' => 0]);

      }


    }


    public function removemultiLikePost($multiid)
    {

        try {
            
            MultipostLike::where('like_user_id', Auth::user()->id)
                ->where('multiple_post_id', $multiid)
                ->delete();
            Post::removeOnemultipostLike($multiid);
           
           return  json_encode( (object) ['status' => 1]);

        } catch (QueryException $ex) {
            return  json_encode( (object) ['status' => 0]);
        }
    }
}
