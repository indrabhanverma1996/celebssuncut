<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentLikes extends Model
{
    use HasFactory;

    protected $table = "tbl_post_commmentlikes";

    protected $primary_key ='id';
}
