<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\LoginActivity;
class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = LoginActivity::where('user_id',$event->user->id)->first();
   if($user==''){
LoginActivity::create([
        'user_id'       =>  $event->user->id,
        'user_agent'    =>  \Illuminate\Support\Facades\Request::header('User-Agent'),
        'ip_address'    =>  \Illuminate\Support\Facades\Request::ip(),
        'created_at'=>  date("Y-m-d h:i:s"),
    ]);

   }else{
      LoginActivity::where('id',$user->id)->update([
        'user_id'       =>  $event->user->id,
        'user_agent'    =>  \Illuminate\Support\Facades\Request::header('User-Agent'),
        'ip_address'    =>  \Illuminate\Support\Facades\Request::ip(),
          'created_at'=>  date("Y-m-d h:i:s"),
    ]);
    }
   }
}
