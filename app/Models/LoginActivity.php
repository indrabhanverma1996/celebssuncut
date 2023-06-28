<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginActivity extends Model
{
    use HasFactory;

    protected $table = 'login_activities';
    protected $primary_key = 'id' ;

     protected $fillable = ['user_id', 'user_agent', 'ip_address'];   

}
