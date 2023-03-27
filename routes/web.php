<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [App\Http\Controllers\logoutController::class, 'logout'])->name('logout');
Route::get('/access/email/{id}', [App\Http\Controllers\AccessEmailController::class, 'access_email'])->name('access.email');
Route::post('/check', [App\Http\Controllers\AccessEmailController::class, 'check'])->name('check');

Route::get('/users-export', [App\Http\Controllers\CsvController::class,'export'])->name('export.csv');
Route::get('/search/name', [App\Http\Controllers\SearchController::class,'search_name'])->name('search.name');
Route::get('/testing', [App\Http\Controllers\SearchController::class,'testing'])->name('testing');
Route::get('/profile/update/{id}', [App\Http\Controllers\ProfileController::class,'profile_update'])->name('profile.update');
Route::post('/profile/confirm/update/{id}', [App\Http\Controllers\ProfileController::class,'profile_confirm_update'])->name('profile_confirm.update');
Route::get('/users/insert', [App\Http\Controllers\ProfileController::class,'users_insert'])->name('users.insert');
Route::post('/insert/users', [App\Http\Controllers\ProfileController::class,'insert_users'])->name('insert.users');
Route::get('/search/job', [App\Http\Controllers\SearchController::class,'search_job'])->name('search.job');             
Route::get('/search/company', [App\Http\Controllers\SearchController::class,'search_company'])->name('search.company');   

// Route::get('get-all-season',function(){
//    $session = session()->all();
//    print_r($session);
// });+

