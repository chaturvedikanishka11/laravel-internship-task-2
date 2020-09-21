<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Blog Routes

Route::match(['get','post'],'addblog','BlogController@addblog');

Route::match(['get','post'],'viewblog','BlogController@viewblog');

Route::POST('/update-status','BlogController@Status');

Route::match(['get','post'],'editblog/{id}','BlogController@editblog');

Route::any('deleteblog/{id}','BlogController@deleteblog');

//Blog keyword Routes

 Route::match(['get','post'],'add_keyword','BlogkeywordController@add_keyword');

 Route::match(['get','post'],'view_keyword','BlogkeywordController@view_keyword');

 Route::match(['get','post'],'edit_keyword/{id}','BlogkeywordController@edit_keyword');

 Route::any('delete_keyword/{id}','BlogkeywordController@delete_keyword');

 Route::POST('/Keyword_Status','BlogkeywordController@Keyword_Status');

// BlogSeo Routes

Route::match(['get','post'],'add_blogseo','BlogseoController@add_blogseo');

Route::match(['get','post'],'view_blogseo','BlogseoController@view_blogseo');

Route::match(['get','post'],'edit_blogseo/{id}','BlogseoController@edit_blogseo');

Route::any('delete_blogseo/{id}','BlogseoController@delete_blogseo');

Route::POST('/Blogseo_Index','BlogseoController@Blogseo_Index');