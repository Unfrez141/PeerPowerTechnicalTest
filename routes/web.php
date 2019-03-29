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


Route::get('/', 'LoansController@showLoansList');
Route::get('/create', 'LoansController@create');
Route::get('/edit/{id}', function ($id) {
    return view('editLoan', ['id' => $id]);
});
Route::get('/update/{id}', 'LoansController@update');
Route::get('/delete', 'LoansController@delete');
Route::get('/view', 'LoansController@insert');
Route::get('/view/{id}', 'LoansController@viewDetail');
