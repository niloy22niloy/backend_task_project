<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    function profile_update($id){
      $user=   User::find($id);
        return view('profile_page',[
            'user'=>$user,
        ]);
    }
   function profile_confirm_update(Request $request,$id){
    User::where('id',$id)->update([
       'designation'=>$request->designation,
       'company'=>$request->company,
       'contact_location'=>$request->contact_location,
       'employees'=>$request->employees,
       'industry'=>$request->industry,
    ]);
    return back()->with('success',"you Have Succeessfully Updated");
   }
   function users_insert(){
    return view('users_insert');
   }
   function insert_users(Request $request){
    
    $request->validate([
      'name'=>'required',
      'email' => 'required|unique:users,email',
      'designation'=>'required',
      'company'=>'required',
      'contact_location'=>'required',
      'employees'=>'required',
      'industry'=>'required',
      
    ]);
  
     User::create([
      'name'=>$request->name,
      'email'=>$request->email,
      'password'=>bcrypt('abc@123'),
      'designation'=>$request->designation,
      'company'=>$request->company,
      'contact_location'=>$request->contact_location,
      'employees'=>$request->employees,
      'industry'=>$request->industry,
      'credits'=>50,
     ]);
     return back()->with('success',"successfully Inserted");
   }
}
