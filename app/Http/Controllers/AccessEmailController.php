<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;


class AccessEmailController extends Controller
{
    //
    function access_email($id){
        $users_email = User::find($id);
        $users_email;
        if($users_email->email){
            $auth = User::find(Auth::user()->id);
            $ss =  $auth->credits;
            // return $ss;
            $deduct_credit =  $ss-1;
            User::where('id',Auth::user()->id)->update([
              'credits'=>$deduct_credit,
            ]);
            return back()->with('success',"Email is ".$users_email->email);
           
        }
    }
    function check(Request $request){
      
      
      $id = $request->check;
      
      $all = count(User::all());
      $ss = User::find($id);
      $sss = count(User::find($id));
      if ($sss<$all){
        User::where('id',Auth::user()->id)->update([
           'checking_all'=>1,
        ]);
      }elseif($sss == $all){
        $all_select_credit =  Auth::user()->credits - $all;
        User::where('id',Auth::user()->id)->update([
            'credits'=>$all_select_credit,
         ]);
         return (new UsersExport($id))->download('users.csv');
      }

      //finding every id comes from the array and checking with the model and getting the result
     foreach ($ss as $s){
         $s->id;
     }
      
       if(Auth::user()->checking_all == 1){
        return (new UsersExport($id))->download('users.csv');
       }else{
         $credits = Auth::user()->credits - 1;
         User::where('id',Auth::user()->id)->update([
            'credits'=>$credits,
         ]);

        return (new UsersExport($id))->download('users.csv');
        
       }
    //   return (new UsersExport($id))->download('users.csv');
   
    // return Excel::download(new UsersExport, 'users.csv');
    
    }
}
