<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logoutController extends Controller
{
    //
    function logout(){
        
        User::where('id',Auth::user()->id)->update([
            'checking_all'=>0,
         ]);
        Auth::logout();

        return redirect('/');
    }
}
