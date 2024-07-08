<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::resource('/', BlogController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






Route::middleware(['guard'])->group(function(){
    Route::resource('/blog/store', BlogController::class);
    Route::get('/editpage/{id}', [BlogController::class , 'edit']);
    Route::post('/edit/{id}', [BlogController::class , 'update']);
    Route::get('/delete/{id}', [BlogController::class , 'destroy']);
    Route::get('/addblog', function(){
        return view('addblog');
    });
});