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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('projects',"ProjectsController")->middleware('auth');
Route::resource('items',"ItemCheckersController")->middleware('auth');
Route::get("/api/list_item_json","ApiController@list_items_json")->middleware("auth");
Route::get("/api/check_item","ApiController@check_item")->middleware("auth");