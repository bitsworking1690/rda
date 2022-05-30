<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/apis/specification/{type}', 'HomeController@show_api_details')->name('show_api_details');

/* Routes for Controllers */
Route::resource('place' , 'PlaceController');
Route::resource('hfacility' , 'HealthFacilityController');
Route::resource('pgeometry' , 'PlaceGeometryController');

Route::post('listing' , 'PlaceController@listing')->name('listing');

/* Routes for Exports/Imports */
Route::get('export/{province}/{type}', 'PlaceController@export')->name('export');
Route::get('importExportView', 'PlaceController@importExportView');
Route::post('import', 'PlaceController@import')->name('import');
