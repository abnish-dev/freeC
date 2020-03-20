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

Route::resource('question','QuestionController');
// Route::get('/search/question','QuestionController@searchQuest');

Route::resource('answer','AnswerController');

Route::resource('blog','BlogController');
Route::post('/blog/delete','BlogController@removeImage');
//Route::get('/search/blog','BlogController@searchBlog');

Route::resource('advertise','AdvertisementController');
//Route::get('/search','AdvertisementController@searchAd');

//Route::get('/userlist','UserListingController@index')->name('userlist.index');
 //Route::get('create', 'UserListingController@create');
 //Route::get('index', 'UserListingController@index')->name('user.index');

Route::get('users', ['uses'=>'UserListingController@index', 'as'=>'users.index']);

Route::group(['middleware' => ['auth', 'user'], 'prefix' => 'user'], function () {
    Route::get('/dashboard', 'UserController@index')->name('user/dashboard');
});

// admin protected routes

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
  Route::get('/dashboard','AdminController@index');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
