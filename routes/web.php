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

use App\Http\Controllers\PrintController;
use App\Http\Controllers\SearchController;


Route::get('/','MainController@home')->name('home-URL');
Route::match(['get', 'post'], '/group{groupname?}','MainController@group')->name('group-URL');
Route::post('/group{groupname?}','MainController@addCart');
Route::get('/selected','MainController@selected')->name('selected-URL');
Route::post('/selected','MainController@selectedDelete');
Route::post('/print','PrintController@getPrint');
// Дроп файлов
Route::get('file-upload', 'FileUploadController@fileUpload')->name('file.upload');
Route::post('file-upload', 'FileUploadController@fileUploadPost')->name('file.upload.post');
//  печать
Route::get('/print', 'PrintController@getPrint')->name('print-get');

Route::post('/search', 'SearchController@searchPost')->name('search-post');
Route::get('/search', 'SearchController@searchGet')->name('search-get');






