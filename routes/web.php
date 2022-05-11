<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MetgeController;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


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
    return view('homepage');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rutas que verá el médico
Route::group(['prefix'=>'metge','middleware'=>['isMetge','auth']],function(){
    Route::get('dashboard',[MetgeController::class,'index'])->name('metge.dashboard');
    Route::get('dashboard',[MetgeController::class,'getMetges'])->name('metge.dashboard');
    Route::get('dashboard/{id}',[MetgeController::class, 'getPacientByID']);
    Route::get('dashboard/{id}/image/{id_image}',[MetgeController::class, 'getImageID']);  
    Route::post('dashboard/update-doctor',[MetgeController::class, 'updateAssociatedDoctor'])->name('update_doctor');
});

//rutas que verá el paciente
Route::group(['prefix'=>'pacient','middleware'=>['isPacient','auth']],function(){
    Route::get('dashboard',[PacientController::class,'getPacient'])->name('pacient.dashboard');
    Route::post('dropzone/store', [PacientController::class,'dropzoneStoreImages'])->name('dropzone.store');
    Route::get('dashboard/upload-images',[PacientController::class,'showUploadImages']);
    Route::get('dashboard/image/{id}',[PacientController::class,'getImageID']); 
});

//rutas que verá el admin
Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth']],function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
});

//rutas que verán todos los usuarios
Route::get('dashboard/canviar-password',[UserController::class,'changePassword'])->name('change_password');
Route::post('dashboard/update-password',[UserController::class,'updatePassword'])->name('update_password');