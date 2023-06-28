<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikedPost extends Model
{
    use HasFactory;
    
    protected $table = "tbl_liked_posts";

    protected $primary_key ='id';
}
