<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Socialite;
use Auth;
use Illuminate\Support\Facades\Hash;
class SocialLoginController extends Controller
{
    public function redirectToGoogle(String $provider)
    {


        return Socialite::driver($provider)->redirect();
    }
   


     public function handleGoogleCallback(String $provider, Request $req)

    {
        try {
    
 
           // $user = Socialite::driver($provider)->user();

            $user = Socialite::driver($provider)->stateless()->user();

            if($provider=='facebook'){
              $avtar =   $user->avatar;
            }else if($provider=='google'){
              $avtar =   $user->avatar;
            }else{
              $avtar =   $user->avatar;
            }
           
            $finduser = User::where('social_id', $user->id)->first();
       
            $find = User::where('email', $user->email)->first();
            // print_r($find);
            // dd($finduser);
            if(!empty($finduser)){
               
               Auth::login($finduser);
               
                return redirect('/');  
            }
            if(!empty($find)){
       
                Auth::login($find);
            
                                   
                   
                return redirect('/');
     
            }else{             

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_profile_image'=>$avtar,
                    'nickname'=>$user->nickname,
                    'social_type'=> $provider,                   
                    'password' =>  Hash::make('123456'),
                ]);
    
                Auth::login($newUser);
     
                return redirect('/');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    } 
}
