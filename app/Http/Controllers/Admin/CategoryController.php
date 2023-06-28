<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){
        $category  = Category::all();
        return view('admin.category.index',compact('category'));

           }

   public function create(){
   return view('admin.category.create');


   }

   public function store( Request $request){

    $category = new Category();

    $category->category_name = $request->category_name;
    $category->status = $request->status;
      
      $category->save();
      return Redirect()->back()->with('success','Data inserted Succesfully');
      
   }

public function edit(Request $request, $id){

    $category = Category::where('id',$id)->first();

   return view('admin.category.edit',compact('category'));


   }
   public function update( Request $request,$id){

    $category = Category::findOrFail($id);

    $category->category_name = $request->category_name;
    $category->status = $request->status;
      
      $category->update();
      return Redirect()->back()->with('success','Data updated Succesfully');
      
   }

    public function delete( Request $request,$id){

   $category = Category::where('id',$id)->first();
      
      $category->delete();
      return Redirect()->back()->with('error','Data delete Succesfully');
      
   }

}
