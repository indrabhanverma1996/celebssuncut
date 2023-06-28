<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusVideo extends Model
{
    use HasFactory;

    protected $table = "tbl_status_video";

    protected $primary_key ='id';
}
