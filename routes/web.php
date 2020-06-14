<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('posts', 'PostController@index');
Route::get('post/new', 'PostController@newPost');
Route::post('post/store', 'PostController@store');
Route::get('name', 'UserController@getCurrentUserId');
Route::get('approvePost/{id}/', 'PostController@approvePost');
Route::get('deletePost/{id}/', 'PostController@deletePost');
Route::post('updatePost/{id}/', 'PostController@updatePost');
Route::get('previewPost/{id}/', 'PostController@previewPost');

Route::post('eml/pass/reset',[
    'uses' => 'ResetPasswordController@reset'
]);
