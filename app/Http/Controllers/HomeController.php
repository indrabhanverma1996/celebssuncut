<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Helper\Helpers;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( Request $request)
    {

 
     $id = Auth::id();
     $postcategory = Category::all();
     $user = User::where('id',Auth::user()->id)->first();
     $post = Post::orderBy('id', 'DESC')->get();

   // $post =   Post::Join('tbl_subscriber', function($join) {
   //   $join->on('tbl_posts.user_id', '=', 'tbl_subscriber.celebirity_user_id');
   // })->where('tbl_subscriber.user_id',Auth::user()->id)->orderBy('tbl_posts.id', 'DESC')->get();
// dd( $post);

     $postmedia = DB::table('tbl_status_video')->orderBy('id', 'DESC')->take(6)->get();
     $country = DB::table('tbl_countries')->get();
     $ipdat = Helpers::getcurrentIp();
     $onfido = DB::table('tbl_onfido_report')->where('user_id',Auth::user()->id)->first();
    $suggestion =  User::where('id', '!=', $id )->inRandomOrder()->orderBy('id','desc')->where('role_id',2)->get(); 

    if(Auth::user()->role_id==1){
         return view('admin.home',compact('country','ipdat'));   
     }elseif(Auth::user()->role_id==2||Auth::user()->role_id==3){        
        return view('front.home',compact('postcategory','user','post','suggestion','postmedia','country','ipdat','onfido')); 
     }
        
        
    }

 public function homepage(){
        $id = Auth::id();
        $data['postcategory'] = Category::all();
         $data['user'] = User::where('id',Auth::user()->id)->first();
         $data['post'] = Post::orderBy('id', 'DESC')->get();

     $data['postmedia'] = DB::table('tbl_post_images')->orderBy('id', 'DESC')->take(6)->get();
      

         $data['suggestion']=  User::where('id', '!=', $id )->inRandomOrder()->orderBy('id','desc')->where('role_id',2)->get();
         
  
  $html = view('front.test')->with($data)->render();

  return response()->json(['html' => $html]);
        // return view('front.home',compact('postcategory','user','post','suggestion','postmedia')); 
    
     }

   public function notification(Request $request){
     $data['message'] = DB::table('tbl_messages')->whereRaw('to_user_id =' . Auth::user()->id . ') OR (from_user_id =' . Auth::user()->id . ')')->orderBy('id', 'DESC')->take(1)->get();

  $html = view('front.notification')->with($data)->render();

  return response()->json(['html' => $html]);
   }

  public function stories(){

    return view('front.stories');
  }



   public function clips(){
    $check = date('Y-m-d:h:i:s', strtotime('-7 days'));
    $postmedia = DB::table('tbl_status_video')->orderBy('id', 'DESC')->where('created_at','>',$check)->get();

  return view('front.clips',compact('postmedia'));

   }

    public function home()
    {
        $id = Auth::id();
        $suggestion =  User::where('id', '!=', $id )->inRandomOrder()->orderBy('id','desc')->where('role_id',2)->get();
       if(Auth::user()->role_id==2){

         return view('admin.home',compact('suggestion')); 

         }  
     
        
    }
}
