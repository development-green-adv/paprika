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

Route::get("/meni/{category?}", "FrontController@getMenuPage");
Route::get("/paprika-live", "FrontController@getPaprikaLive");
Route::get("/o-nama", "FrontController@getAbout");
Route::get("/kontakt", "FrontController@getKontakt");



// rute za admin deo
Route::get("/admin/login", "AdminController@loginView")->name("admin.login");
Route::get("/admin/home", "AdminController@homePage")->middleware("auth");


// rute za proizvode
Route::get("/admin/add-products", "AdminController@getAddProducts")->middleware("auth");
Route::post("/admin/add-product", "AdminController@storeProduct")->middleware("auth");
Route::get("/admin/list-products", "AdminController@listProducts")->middleware("auth");
Route::get("/admin/edit-product/{id}", "AdminController@getEditProduct")->middleware("auth");
Route::post("/admin/edit-product", "AdminController@updateProduct")->middleware("auth");
Route::get("/admin/delete-product/{id}", "AdminController@deleteProduct")->middleware("auth");
Route::get("/admin/sort-products", "AdminController@getSortProduct")->middleware("auth");
Route::post("/admin/sort-products", "AdminController@sortProduct")->middleware("auth");

Route::post("/admin/get-sort-product", "AdminController@sortedProduct")->middleware("auth");


//rute za dodatke 
Route::get("/admin/add-dodatak", "AdminController@getAddDodatak")->middleware("auth");
Route::post("/admin/add-dodatak", "AdminController@storeDodatak")->middleware("auth");
Route::get("/admin/list-dodatak", "AdminController@listDodatak")->middleware("auth");
Route::get("/admin/delete-dodatak/{id}", "AdminController@deleteDodatak")->middleware("auth");



// rute za admine
Route::get("/admin/dodaj-administratora", "AdminController@getAddAdmin")->middleware("auth");
Route::post("/admin/dodaj-administratora", "AdminController@storeAdmin")->middleware("auth");
Route::get("/admin/lista-administratora", "AdminController@listAdmins")->middleware("auth");
Route::get("/admin/obrisi-administratora/{id}", "AdminController@deleteAdmin")->middleware("auth");



// ruta za dodavanje slika u galeriji
Route::post("/admin/dodaj-galeriju-slika", "AdminController@storeImages")->middleware("auth");

Route::get("/home", "HomeController@index");

Auth::routes();

