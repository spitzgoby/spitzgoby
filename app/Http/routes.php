<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    // ABOUT //
    Route::get('/about', ['as' => 'about.index', 'uses' => 'AboutController@getIndex']);
    Route::get('/about/resume', ['as' => 'about.resume', 'uses' => 'AboutController@getResume']);

    // POSTS //
    Route::resource('posts', 'PostsController', ['only' => ['index', 'show']]);

    // CODE //
    Route::resource('code', 'CodeController', ['only' => ['index', 'show']]);

    // ADMIN //
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
        // LOGIN //
        Route::get('login', 'Auth\AuthController@getLogin');
        Route::post('login', 'Auth\AuthController@postLogin');
        Route::get('logout', 'Auth\AuthController@getLogout');

        Route::group(['middleware' => 'auth'], function() {
            Route::get('/', function() {
                return view('welcome');
            });

            Route::resource('posts', 'PostsController');
        });
    });
});

