<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
    'uses' => 'MainController@index',
    'as' => 'index'
]);
Route::post('/login', 'MainController@login');

/*Auth Middleware starts here*/
Route::get('/home', [
    'uses' => 'MainController@home',
    'as' => 'home'
]);

Route::get('not-found', function () {
    return 'Not Found';
})->name('notFound');

Route::post('/files', [
    'uses' => 'MainController@fileUpload',
    'as' => 'fileUpload'
]);
Route::get('/logout', [
    'uses' => 'MainController@logout',
    'as' => 'logout'
]);


/*For Admin*/
Route::group(['prefix' => 'a/admin'], function () {

    Route::get('/', [
        'uses' => 'AdminController@index',
        'as' => 'admin.login'
    ]);
    Route::post('/login', [
        'uses' => 'AdminController@login',
        'as' => 'post.login'
    ]);

    /*Admin Middleware starts here*/
    Route::get('/dashboard', [
        'uses' => 'AdminController@dashboard',
        'as' => 'admin.dashboard'
    ]);
    Route::get('/users', [
        'uses' => 'AdminController@users',
        'as' => 'admin.users'
    ]);

    Route::get('/user/{id}/file', [
        'uses' => 'AdminController@getFiles',
        'as' => 'admin.getFile'
    ]);

    Route::get('files', [
        'uses' => 'AdminController@files',
        'as' => 'admin.files'
    ]);

    Route::get('/logout', [
        'uses' => 'AdminController@logout',
        'as' => 'admin.logout'
    ]);

});
