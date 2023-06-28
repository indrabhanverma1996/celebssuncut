<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultipostLike extends Model
{
    use HasFactory;
    protected $table = "tbl_post_image_liked";

    protected $primary_key ='id';
}
