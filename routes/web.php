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
Route::get('/catalog',  'Catalog\CatalogController@index')->name('catalog');
Route::get('/export',  'Catalog\CatalogController@export')->name('export');
Route::post('/import',  'Catalog\CatalogController@import')->name('import');
