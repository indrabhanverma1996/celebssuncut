<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

     protected $table = "tbl_post_comments";

    protected $primary_key ='id';
      protected $fillable = [
        'comment_user_id',
        'post_id',
        'comment',
        'likes',
        'published_at',
        'created_at',
      
    ];
}
