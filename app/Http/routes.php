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
    Route::get('/about', 'PagesController@about');
    Route::post('user/{id}/feedback', 'Insertions\FeedbacksController@create');
    Route::resource('posts', 'Insertions\PostsController');
    Route::resource('adverts', 'Insertions\AdvertsController');
    Route::post('posts/{postId}/comments/', 'Insertions\CommentsController@create');
    Route::get('user/{id}', 'UsersController@show');
    Route::get('dashboard', 'UsersController@edit');
    Route::put('dashboard/{id}', 'UsersController@update');

    Route::get('upload', function() {
        return View::make('users.upload');
    });
    Route::post('upload', 'UploadController@upload');

    //admin panel
    Route::get('/admin', 'Admin\AdminController@index');
    Route::get('/admin/users', 'Admin\AdminController@users');

    Route::resource('/admin/roles', 'Admin\RolesController');
    Route::resource('/admin/permissions', 'Admin\PermissionsController');
});

Route::post('about', 'EmailController@showForm');
Route::post('about', 'EmailController@handleFormPost');


Route::get('setlocale/{locale}', function ($locale) {

    if (in_array($locale, \Config::get('app.locales'))) {   # ѕровер€ем, что у пользовател€ выбран доступный €зык
        Session::put('locale', $locale);                    # » устанавливаем его в сессии под именем locale
    }
});
