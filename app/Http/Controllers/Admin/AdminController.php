<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    

    public function organization( ){
   
   $organization = DB::table('organization')->paginate(2);
   return view ('admin.organization.index',compact('organization'));
   
    
    }

    public function organizationCreate(){
    
   return view ('admin.organization.create');
        
    }

    public function organizationstore(Request $request){
   

   DB::table('organization')->insert([
           
            'organization_name'=>$request->organization_name,
            'status'=>$request->status
        ]);

      
        
 return Redirect()->back()->with('success','Data updated Succesfully');
    }
    public function organizationEdit($id){

 $organization = DB::table('organization')->where('id',$id)->first();

         
   return view ('admin.organization.edit',compact('organization'));
    }
    public function organizationUpdate(Request $request,$id){
      
      DB::table('organization')->where('id','=',$id)->update([           
            'organization_name'=>$request->organization_name,
            'status'=>$request->status
        ]);

 return Redirect()->back()->with('success','Data updated Succesfully');
        
    }


     

    public function organizationDelete($id)
    {

    $organization = DB::table('organization')->where('id',$id)->delete();
     
     return Redirect()->back()->with('error','Data deleted Succesfully');
        
    }




    }
