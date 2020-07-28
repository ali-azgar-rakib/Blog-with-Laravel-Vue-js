<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.layout.frontend');
});

Auth::routes();

Route::get('/admin-home', 'HomeController@index')->name('home');


// for any type route 

// Route::get('/{path}', 'HomeController@index')->where('path', '.*');


Route::group(['middleware' => ['auth']], function () {
    // category 
    Route::get('/all_category', 'CategoryController@all_category');
    Route::post('/add-category', 'CategoryController@add_category');
    Route::get('/category/{category}', 'CategoryController@delete_category');
    Route::get('/edit-category/{category}', 'CategoryController@edit_category');
    Route::post('/update-category/{category}', 'CategoryController@update_category');


    // post 
    Route::get('/all_post', 'PostController@all_post');
    Route::post('/add_post', 'PostController@add_post');
    Route::get('/edit-post/{post}', 'PostController@edit_post');
    Route::post('/update-post/{post}', 'PostController@update_post');
    Route::get('/delete-post/{post}', 'PostController@delete_post');
});

// frontend controller 
Route::get('blogs', 'FrontendController@blogs');
Route::get('/blog/{id}', 'FrontendController@blog');
Route::get('/all-category', 'FrontendController@all_category');
Route::get('/category-post/{id}', 'FrontendController@category_post');
Route::get('/search', 'FrontendController@search');
Route::get('/sidebar-blogs', 'FrontendController@sidebar_blogs');