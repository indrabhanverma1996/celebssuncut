<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postpayment extends Model
{
    use HasFactory;


    protected $table = "tbl_post_payment";

    protected $primary_key ='id';
}
