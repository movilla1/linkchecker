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
    Route::get("/items_project/{project_id}","ItemsController@show")->name("project_items"); //change the show route.
    Route::resource('items',"ItemsController");
    Route::get("/api/list_item_json","ApiController@list_items_json");
    Route::get("/api/check_item","ApiController@check_item");
    Route::get("/trash","TrashController@manage")->name("trash");
    Route::get("/trash/ui/{item}","TrashController@unerase_item")->name("trash_unerase_item");
    Route::get("/trash/up/{project}","TrashController@unerase_project")->name("trash_unerase_project");
    Route::delete("/trash/empty","TrashController@empty")->name("trash_empty");
    Route::delete("/trash/ri/{item}","TrashController@remove_item")->name("trash_item_remove");
    Route::delete("/trash/rp/{project}","TrashController@remove_project")->name("trash_project_remove");
});

Route::group(['middleware' => ['auth','role'], 'roles' => ['admin']], function (){
    Route::resource('users', "UsersController");
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');