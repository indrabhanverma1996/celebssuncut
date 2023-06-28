<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscription extends Model
{
    use HasFactory;
 protected $table ='tbl_subscriber';
    protected $primary_key ='id';

    public function subscriptions()
{
 return $this->belongsToMany('App\User', 'tbl_subscriber', 'user_id',     
 'celebirity_user_id')->withTimestamps();
}

}
