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
    Route::resource('items',"ItemCheckersController")->middleware('auth');
    Route::get("/api/list_item_json","ApiController@list_items_json")->middleware("auth");
    Route::get("/api/check_item","ApiController@check_item")->middleware("auth");
});

Route::group(['middleware' => ['auth','role'], 'roles' => ['admin']], function (){
    Route::resource('users', "usersController");
});

