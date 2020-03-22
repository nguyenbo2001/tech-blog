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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/blog', 'HomeController@index')->name('blog');

Route::get('about', 'HomeController@about')->name('about');

Route::post('contact', 'HomeController@contact')->name('contact');

Route::get('category/{slug}', 'HomeController@category')->name('category');

Route::get('post/{slug}', 'HomeController@post')->name('post');

Route::get('author/{user}', 'HomeController@author')->name('author');

Route::post('comment/{post}', 'CommentController@store')->name('comment');

Route::get('user-profile', 'HomeController@profile')->name('profile');

Route::post('user-profile', 'HomeController@storeProfile')->name('update-profile');

Route::get('search', 'HomeController@search')->name('search');

Route::get('category-by-term/{term}', 'HomeController@getCategoryByTerm')->name('get-category-by-term');

Route::get('term-by-category/{category}', 'HomeController@getTermByCategory')->name('get-term-by-category');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', \App\Http\Middleware\Admin::class]], function() {
    Route::get('/', 'AdminController@index')->name('home');

    Route::resources([
        'terms' => 'TermController',
        'categories' => 'CategoryController',
        'posts' => 'PostController',
        'users' => 'UserController'
    ]);

    Route::group(['prefix' => 'comments', 'as' => 'comments.'], function() {
        Route::get('/', 'CommentController@index')->name('index');

        Route::delete('delete/{comment}', 'CommentController@destroy')->name('destroy');
    });
});
