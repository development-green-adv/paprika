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


// rute za admin deo
Route::get("/admin/login", "AdminController@loginView")->name("admin.login");
Route::get("/admin/home", "AdminController@homePage")->middleware("auth");



// rute za proizvode
Route::get("/admin/add-products", "AdminController@getAddProducts")->middleware("auth");


// rute za admine
Route::get("/admin/dodaj-administratora", "AdminController@getAddAdmin")->middleware("auth");
Route::post("/admin/dodaj-administratora", "AdminController@storeAdmin")->middleware("auth");
Route::get("/admin/lista-administratora", "AdminController@listAdmins")->middleware("auth");
Route::get("/admin/obrisi-administratora/{id}", "AdminController@deleteAdmin")->middleware("auth");


Route::get("/home", "HomeController@index");

Auth::routes();

