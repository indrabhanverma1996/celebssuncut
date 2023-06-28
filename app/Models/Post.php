<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Post extends Model
{
   use HasFactory;

    protected $table = "tbl_posts";

    protected $primary_key ='id';




     public static function getPost($postId)
    {
        $post = Post::find($postId);
        if (!$post) {
            return false;
        }
        $post->images = PostImage::where('post_id', $postId)->get();
        return $post;
    }

    public static function getPosts(int $offset = self::POST_OFFSET, int $limit = self::POST_LIMIT)
    {
        //get self Id and friends' ids
        $sql_friends = 'SELECT user_two_id FROM relationships WHERE status=1 AND user_one_id = ' . Auth::user()->id;
        $sql_friends .= ' UNION SELECT user_one_id FROM relationships WHERE status=1 AND user_two_id = ' . Auth::user()->id;
        $sql_friends .= ' UNION SELECT ' . Auth::user()->id;

        $sql = ' SELECT tbl_posts.id,tbl_posts.user_id, tbl_posts.likes, tbl_posts.comments, tbl_posts.content, tbl_posts.published_at, users.username, users.profile_photo_path FROM tbl_posts ';
        $sql .= ' LEFT JOIN users';
        $sql .= ' ON tbl_posts.user_id = users.id';
        $sql .= ' WHERE tbl_posts.user_id IN ( ' . $sql_friends . ' ) AND tbl_posts.deleted_at IS NULL ';
        $sql .= ' ORDER BY tbl_posts.published_at DESC';
        $sql .= ' LIMIT ' . $limit . ' OFFSET ' . $offset;
        $posts = DB::select(DB::raw($sql), array());
        foreach ($posts as $key => &$post) {

            //get post images
            if ($post->profile_photo_path == '') {
                $post->profile_photo_path = 'images/users/defaultProfileImage.png';
            }
            $images = PostImage::where('post_id', $post->id)->get();
            $post->images = $images;

            $post->userLike = LikedPost::where('post_id', $post->id)
                ->where('user_id', Auth::user()->id)
                ->get();
            $post->saved = SavedPost::where('post_id', $post->id)
                ->where('user_id', Auth::user()->id)
                ->get();
            $post->numComments = $post->comments;
            $post->comments = PostComment::where('post_id', $post->id)->orderByDesc('published_at')->get();
            foreach ($post->comments as &$comment) {
                $comment->username  = User::select('username')
                    ->where('id', $comment->user_id)
                    ->first()->username;
            }
        }
        return $posts;
    }

    /**
     * Return the published posts belonging to the user.
     * Note: the archived posts are not included
     */
    public static function getUserPosts($userId)
    {
        $posts = Post::where('user_id', $userId)->orderByDesc('published_at')->get();
        foreach ($posts as $key => $post) {
            self::getPostData($post);
        }
        return $posts;
    }
    public static function addOneComment(int $postId)
    {
        $sql = 'UPDATE tbl_posts SET comments = comments + 1 WHERE id =' . $postId;
        DB::update(DB::raw($sql), []);
    }

    
    public static function  addOneLike(int $postId)
    {
        $sql = 'UPDATE tbl_posts SET likes = likes + 1 WHERE id=' . $postId;
        DB::update(DB::raw($sql), []);
 
    }
    public static function  addOnecommentLike(int $postId)
    {

         $sql = 'UPDATE tbl_post_comments SET likes = likes + 1 WHERE id=' . $postId;
         

        DB::update(DB::raw($sql), []);
 
        
 
    }


    public static function  addOnemultipostLike(int $postId)
    {
       
        $sql = 'UPDATE  tbl_post_images SET likes = likes + 1 WHERE id=' . $postId;
      
        DB::update(DB::raw($sql), []);
         
         

    }
  public function  removeOnemultipostLike(int $postId){
 $sql = 'UPDATE tbl_post_images SET likes = likes - 1 WHERE id=' . $postId;
        DB::update(DB::raw($sql), []);
  }

    public static function removeOnecommentLike(int $commentid)
    {
        $sql = 'UPDATE tbl_post_comments SET likes = likes - 1 WHERE id=' . $commentid;
        DB::update(DB::raw($sql), []);
    }

  
    

    public static function removeOneLike(int $postId)
    {
        $sql = 'UPDATE tbl_posts SET likes = likes - 1 WHERE id=' . $postId;
        DB::update(DB::raw($sql), []);
    }
    public static function removeOneComment(int $postId)
    {
        $sql = 'UPDATE tbl_posts SET comments = comments - 1 WHERE id=' . $postId;
        DB::update(DB::raw($sql), []);
    }

    public static function getSavedPosts()
    {
        $userId = Auth::user()->id;

        $savedPosts = SavedPost::where('user_id', $userId)->get();
        //dd($savedPosts);
        if(!$savedPosts){
            return null;
        }
        foreach ($savedPosts as $savedPost) {
            //a user can save a post and later on the owner of the user can archive it
            $foundPost = Post::find($savedPost->post_id);
            if($foundPost){
                $posts[] = $foundPost;
            }
        }
        if(!isset($posts)){
            return null;
        }
        foreach ($posts as $key => $post) {
            self::getPostData($post);
        }
        return $posts;
    }

    public static function getDeletedPosts()
    {
        $userId = Auth::user()->id;
        $posts = Post::onlyTrashed()->where('user_id', $userId)->get();

        foreach ($posts as $key => $post) {
            self::getPostData($post);
        }
        return $posts;
    }
    public static function getPostData(&$post)
    {
        $post->images = PostImage::where('post_id', $post->id)->get();
        $post->comments = PostComment::where('post_id', $post->id)->get();
        $post->userLike = LikedPost::where('post_id', $post->id)
            ->where('user_id', Auth::user()->id)
            ->get();
        $post->saved = SavedPost::where('post_id', $post->id)
            ->where('user_id', Auth::user()->id)
            ->get();
        foreach ($post->comments as &$comment) {
            $comment->username  = User::select('username')
                ->where('id', $comment->user_id)
                ->first()->username;
        }
    }
}
