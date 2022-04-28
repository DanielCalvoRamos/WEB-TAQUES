<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MetgeController;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'metge','middleware'=>['isMetge','auth']],function(){
    
    Route::get('dashboard',[MetgeController::class,'index'])->name('metge.dashboard');
    Route::get('dashboard',[MetgeController::class,'getMetges'])->name('metge.dashboard');
    Route::get('dashboard/{id}',[MetgeController::class, 'getPacientByID']);
    Route::get('dashboard/{id}/image/{id_image}',[MetgeController::class, 'getImageDetails']);
    
});
Route::group(['prefix'=>'pacient','middleware'=>['isPacient','auth']],function(){
    Route::get('dashboard',[PacientController::class,'index'])->name('pacient.dashboard');
    Route::post('dropzone/store', [PacientController::class,'dropzoneStore'])->name('dropzone.store');
    Route::get('dashboard/upload-images',[PacientController::class,'showUploadImages']);

});
