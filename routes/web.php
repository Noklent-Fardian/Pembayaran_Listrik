<?php

// use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome',[
        "title" => "Dashboard",
]);
});
Route::get('/login', function () {
    return view('login',[
        "title" => "Login",
]);
});
Route::get('/pembayaran', function () {
    return view('pembayaran/base',[
        "title" => "Menu",
]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
     Route::namespace('App\Http\Controllers')->group(function () {
        Route::resource('level', LevelController::class);
        
     }); 
     
 });