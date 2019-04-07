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

Route::get('/report', ['as' => 'complaint', 'uses' => 'ComplaintController@complaint']);
Route::get('/report/submit/page', ['as' => 'complaint.submit.page', 'uses' => 'ComplaintController@submitPage']);
// post image to server
Route::post('/report/submit', ['as' => 'complaint.submit', 'uses' => 'ComplaintController@submit']);
// submit success page
Route::get('/report/submit/success', ['as' => 'complaint.submit.success', 'uses' => 'ComplaintController@submitSuccessPage']);

Route::get('/errors/validationError', ['as' => 'errors.validation.error', 'uses' => 'ComplaintController@validationError']);
