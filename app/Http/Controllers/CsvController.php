<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\User;



class CsvController extends Controller
{
    //
    function export_csv(){
        return (new ExportUsers)->download('users.csv', \Maatwebsite\Excel\Excel::CSV);
    }
    function export(){
        // return Excel::download(new UsersExport, 'users.xlsx');
        // return (new UsersExport)->download('users.csv', \Maatwebsite\Excel\Excel::CSV);
        return Excel::download(new UsersExport, 'users.csv');
    }
}
