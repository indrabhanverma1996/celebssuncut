<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Charity;
use DB;
use Auth;
class CharityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $charity = Charity::where('celebrity_id',Auth::user()->id)->get();
        return view('front.celeberity.charity.index',compact('charity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organization = DB::table('organization')->get();
         return view('front.celeberity.charity.create',compact('organization'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $charity = new  Charity();
            

         $charity->organization_id = json_encode($request->organization_id);

         $charity->celebrity_id = Auth::user()->id; 
         $charity->fixed_amount = $request->fixed_amount; 
         $charity->per_ammount  =$request->per_ammount;
         $charity->no_of_days  =  $request->no_of_days;

         $charity->save();

          return Redirect()->back()->with('success','Data inserted Succesfully');
       



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    public function edit($id)
    {

          $organization = DB::table('organization')->get();

        $charity = Charity::where('id',$id)->first();
        return view('front.celeberity.charity.edit',compact('charity','organization')); 
    }

    
    public function update(Request $request, $id)
    {
        $charity = Charity::findOrFail($id);
            

         $charity->organization_id = json_encode($request->organization_id);

          $charity->celebrity_id = Auth::user()->id;
         $charity->fixed_amount = $request->fixed_amount; 
         $charity->per_ammount  =$request->per_ammount;
         $charity->no_of_days  =  $request->no_of_days;

         $charity->update();

          return Redirect()->back()->with('success','Data updated Succesfully');
       
    }

    
    public function destroy($id)
    {
        
       $charity = Charity::where('id',$id)->first();
      
      $charity->delete();
      return Redirect()->back()->with('error','Data delete Succesfully');
      
    }
}
