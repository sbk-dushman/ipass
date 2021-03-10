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



Route::get('/','MainController@home')->name('home-URL');
Route::get('/group{groupname?}','MainController@group')->name('group-URL');
Route::post('/group{groupname?}','MainController@addCart');
Route::get('/selected','MainController@selected')->name('selected-URL');
Route::post('/selected','MainController@selectedDelete');
// / Дроп файлов
Route::get('file-upload', 'FileUploadController@fileUpload')->name('file.upload');
Route::post('file-upload', 'FileUploadController@fileUploadPost')->name('file.upload.post');






