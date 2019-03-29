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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'LoansController@showList');
Route::get('/create', 'LoansController@create');
Route::post('/view', 'LoansController@viewParse');
Route::get('/view/{id}', 'LoansController@view')->name('view');
// Route::resource('/', 'repository');
// Route::get('/form', function () {
//     return view('form');
// });