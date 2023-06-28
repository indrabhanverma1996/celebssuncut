<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCommentReply extends Model
{
    use HasFactory;
    protected $table ='tbl_post_comment_replies';
    protected $primary_key = 'id';

     protected $fillable = [
        'comment_id ',
        'comment_user_id',
        'comment',
        'likes',
        'status',
        'updated_at',
        'created_at',
      
    ];
}
