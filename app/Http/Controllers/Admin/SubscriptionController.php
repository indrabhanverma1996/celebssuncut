<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB; 
use Auth;
class SubscriptionController extends Controller
{
   public function index(){
  //$subscription =  DB::table('tbl_post_payment')->get();
      $subscription =  DB::table('tbl_post_payment')
            ->join('users', 'tbl_post_payment.user_id', '=', 'users.id')
            ->leftjoin('tbl_posts', 'tbl_post_payment.post_id', '=', 'tbl_posts.id')
            
            ->leftjoin('category', 'tbl_post_payment.category_id', '=', 'category.id')
            ->select('tbl_post_payment.*', 'users.name', 
            'tbl_posts.content','category.category_name')->get();
//dd($subscription);
    return view('admin.subscription.subscription_list',compact('subscription'));

   }


   public function subscription(Request $request){
$subscriptionplan = DB::table('tbl_subscription_plan')->where('user_id',Auth::user()->id)->get();
    return view('celebirity/subscriptionplan.index',compact('subscriptionplan'));
   }

   public function plancreate(){
       $category = DB::table('category')->whereIn('id',[3,4,5])->get();
   return view('celebirity/subscriptionplan.create',compact('category'));
    
   }
   public function planstore( Request $request){
  DB::table('tbl_subscription_plan')->insert(['plan_price'=>$request->plan_price,'user_id'=>Auth::user()->id,'category_id'=>$request->category_id,'plan_days'=>$request->plan_days]);
   return Redirect()->back()->with('success', 'plan created successfully');
    
   }
    public function planedit($id){
              $category = DB::table('category')->whereIn('id',[3,4,5])->get();
        $subscriptionplan = DB::table('tbl_subscription_plan')->where('id',$id)->first();
     return view('celebirity/subscriptionplan.edit',compact('subscriptionplan','category'));
    
    }

   public function planupdate(Request $request,$id){
 DB::table('tbl_subscription_plan')->where('id',$id)->update(['plan_price'=>$request->plan_price,'user_id'=>Auth::user()->id,'category_id'=>$request->category_id,'plan_days'=>$request->plan_days]);
   return Redirect()->back()->with('success', 'plan updated successfully');
    
   }
   public function plandestroy($id){
       
   }
}
