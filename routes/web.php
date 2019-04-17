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
Route::get('/support', ['as' => 'support.page', 'uses' => 'IndexController@support']);
Route::get('/report', ['as' => 'complaint', 'uses' => 'ComplaintController@complaint']);
Route::get('/report/submit/page', ['as' => 'complaint.submit.page', 'uses' => 'ComplaintController@submitPage']);
// post image to server
Route::post('/report/submit', ['as' => 'complaint.submit', 'uses' => 'ComplaintController@submit']);
// submit success page
Route::get('/report/submit/success', ['as' => 'complaint.submit.success', 'uses' => 'ComplaintController@submitSuccessPage']);

Route::get('/errors/validationError', ['as' => 'errors.validation.error', 'uses' => 'ComplaintController@validationError']);

Route::post('/{ID}/upload', ['as' => 'ID.upload', 'uses' => 'IndexController@IDUpload'])->where('ID', '[@A-Za-z0-9-_\.]+');

Route::get('/download/{ID}/{filename}', ['as' => 'avatar.ID.filename.ext', 'uses' => 'IndexController@downloadFilename'])
    ->where([
        'ID'=>'[@A-Za-z0-9-_\.]+',
        'filename'=>'[A-Za-z0-9-_\.]+'
    ]);

Route::get('/avatar/{ID}/{filename}.{ext}', ['as' => 'avatar.ID.filename.ext', 'uses' => 'IndexController@avatarFilename'])
    ->where([
        'ID'=>'[@A-Za-z0-9-_\.]+',
        'filename'=>'[A-Za-z0-9-_]+',
        'ext'=>'jpg|jpeg|png',
        ]);

Route::get('/avatar/{ID}.{ext}', ['as' => 'avatar.ID.ext', 'uses' => 'IndexController@avatarIDExt'])
    ->where([
        'ID'=>'[@A-Za-z0-9-_\.]+',
        'ext'=>'jpg|jpeg|png',
    ]);
Route::get('/{ID}/avatar.{ext}', ['as' => 'avatar.ID.ext', 'uses' => 'IndexController@IDAvatarExt'])
    ->where([
        'ID'=>'[@A-Za-z0-9-_\.]+',
        'ext'=>'jpg|jpeg|png',
    ]);
