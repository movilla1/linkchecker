<?php

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

Auth::routes();

Route::group(['middleware' => ['auth','role'], 'roles' => ['admin', 'user']], function (){
    Route::view('/', 'home');
    Route::resource('projects',"ProjectsController");
});

Route::group(['middleware' => ['auth','role'], 'roles' => ['admin']], function (){
    Route::resource('users', "UsersController");
});
