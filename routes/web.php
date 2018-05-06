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
    //return view('welcome');
    //Route::resource('crud','CRUDController');
    return redirect()->route('crud.index');
    //return view('crud.mains');;
});
Route::resource('crud','CRUDController');
// Route::get('update','CRUDController@update');
Route::post('srch','CRUDController@srch')->name('srch');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
