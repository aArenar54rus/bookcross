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
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'PagesController@Index');
    Route::resource('posts', 'Insertions\PostsController');
    Route::resource('adverts', 'Insertions\AdvertsController');
    //Route::controller('comments', 'Insertions\CommentsController');
    //Route::resource('comments', 'Insertions\CommentsController');
    Route::post('posts/{postId}/comments/', 'Insertions\CommentsController@create');

    Route::get('user', 'UsersController@show');
    Route::get('personal_options', 'UsersController@update');
});
