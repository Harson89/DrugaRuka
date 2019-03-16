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
    return view('home');
});

Auth::routes();

//basic routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'AboutController@about')->name('about');

//prikaz samo jednog produkta
Route::get('product/{item_id}','productController@showById');

//Moj profil
Route::get('/addItem', 'myProfileController@addItem');
Route::get('/myProfile', 'myProfileController@index');
Route::post('additemExecute', 'myProfileController@addItemExecute');


//Route::get('kategorije/{category_id}', 'categoriesController@show');


//Rute za ispis gender stranica
Route::get('/male', 'GenderController@male')->name('male');
Route::get('/female', 'GenderController@female')->name('female');
Route::get('/child', 'GenderController@child')->name('child');
Route::get('/unisex', 'GenderController@unisex')->name('unisex');


