<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'client', 'prefix' => 'v1', 'namespace' => 'Api'], function() {
    
    Route::group(['prefix' => 'user'], function() {

        Route::get('/', 'UsersController@getUser')->middleware('auth:api');
        Route::post('/register', 'UsersController@registerUser');

    });


    Route::group(['prefix' => 'film'], function() {

        Route::get('get-films', 'FilmsController@getFilms');
        Route::get('get-film-by-slug', 'FilmsController@getFilm');

        Route::post('add-film', 'FilmsController@addFilm')->middleware('auth:api');
        Route::post('add-comment', 'FilmsController@addComment')->middleware('auth:api');

    });
    
});
