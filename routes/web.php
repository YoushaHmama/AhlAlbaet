<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/************************************User Routes***********************************/
Route::group(['prefix'=>'users'],function(){
    Route::get('/register',[UserController::class,'register_page']);
    Route::post('/create',[UserController::class,'Register'])->name('signup');
    Route::get('/wait',[UserController::class,'wait_page'])->name('wait');
    Route::get('/login',[UserController::class,'login_page'])->name('log_page');
    Route::post('/enter',[UserController::class,'Login'])->name('log');
    Route::get('/user_system/{user_id}',[UserController::class,'user_system_page'])->name('user_interface');
    Route::post('/edit/{user_id}',[UserController::class,'Edit'])->name('edit');
    Route::get('/main_page',[UserController::class,'logout'])->name('logout');
    Route::get('/loading',[UserController::class,'loading'])->name('loading');
    Route::post('/posting/{user_id}',[PostController::class,'create_post'])->name('posting');
    Route::post('/favorite/{user_id}/{post_id}',[PostController::class,'Favorite'])->name('favorite');
});
/************************************End******************************************/

/**********************************Admin Routes*********************************/
    Route::group(['prefix'=>'admin'],function(){
        Route::get('/dashboard',[AdminController::class,'Dashboard'])->name('admin');
        Route::post('/remove/{user_id}',[AdminController::class,'Remove'])->name('remove_user');
        Route::post('/remove_post/{post_id}',[AdminController::class,'remove_post'])->name('remove_post');
        Route::post('/agree_post/{post_id}',[AdminController::class,'agree_post'])->name('agree_post');
        Route::post('/disagree_user/{user_id}',[AdminController::class,'disagree_user'])->name('disagree_user');
        Route::post('/agree_user/{user_id}',[AdminController::class,'agree_user'])->name('agree_user');
    });
/************************************End***************************************/