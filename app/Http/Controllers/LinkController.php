<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    
    
    public function liveuncuttv(){
    return view('front.link.live_uncut_tv');
       

    }
    
    
    public function megastar(){
   return view('front.link.mega_star');
       

    }
    public function payment(){
return view('front.link.payment');
       

    }
    public function payperclick(){
   return view('front.link.pay_perclick');
       

    }
    
    
    public function payperview(){

       return view('front.link.pay_per_view');

    }
    public function poll(){
   return view('front.link.poll');
       

    }
    public function uncutvipclub(){

       return view('front.link.uncut_vip_club');

    }
    public function vipmembership(){
return view('front.link.vip_membership');
       

    }
    
      public function uncutsubscription(){
return view('front.link.uncut_subscription');
       

    }
}
