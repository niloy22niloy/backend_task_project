<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Console\Scheduling\Event;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    //
    function search_name(Request $request){
       
      
        if($request->name == Null){
            return back()->with('success',"no data found");
         }


         $pageRefreshCount = request()->cookie('page_refresh_count', 0);
          $pageRefreshCount++;
          $search_text = $request->input('name');
          $name = User::where('name', 'LIKE', '%' . $search_text . '%')->get();
      
     $response = response()
    ->view('testing', [
        'page_refresh_count' => $pageRefreshCount,
        'name' => $name,
        'search_text'=>$search_text,
    ])
    ->cookie('page_refresh_count', $pageRefreshCount, 0.0166666666666667); // 1 second// 60 is the number of minutes the cookie will be stored

     return $response;


         

        
    }

    function search_job(Request $request){
       
        if($request->job == Null){
            return back()->with('success',"no data found");
         }


         $pageRefreshCount = request()->cookie('page_refresh_count', 0);
          $pageRefreshCount++;
          $search_text = $request->input('job');
          $name = User::where('designation', 'LIKE', '%' . $search_text . '%')->get();
      
     $response = response()
    ->view('testing', [
        'page_refresh_count' => $pageRefreshCount,
        'name' => $name,
        'search_text'=>$search_text,
    ])
    ->cookie('page_refresh_count', $pageRefreshCount, 0.0166666666666667); // 1 second// 60 is the number of minutes the cookie will be stored

     return $response;
       
    }
    function search_company(Request $request){
        if($request->company == Null){
            return back()->with('success',"no data found");
         }


         $pageRefreshCount = request()->cookie('page_refresh_count', 0);
          $pageRefreshCount++;
           $search_text = $request->input('company');
          $name = User::where('company', 'LIKE', '%' . $search_text . '%')->get();
      
     $response = response()
    ->view('testing', [
        'page_refresh_count' => $pageRefreshCount,
        'name' => $name,
        'search_text'=>$search_text,
    ])
    ->cookie('page_refresh_count', $pageRefreshCount, 0.0166666666666667); // 1 second// 60 is the number of minutes the cookie will be stored

     return $response;
        
}
}
