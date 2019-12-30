
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// Route::resource('admins', 'AdminController')->middleware('isAdmin');
// Route::resource('rewards', 'RewardController');


Route::get('/', 'VisitorController@index')->middleware('auth');


Route::get('admins/', 'AdminController@index')->middleware('isAdmin');
Route::post('admins/', 'AdminController@store')->middleware('isAdmin');
Route::get('admins/create', 'AdminController@create')->middleware('isAdmin');
Route::get('admins/{venue}/show', 'AdminController@show')->middleware('isAdmin');
Route::get('admins/{venue}/edit', 'AdminController@edit')->middleware('isAdmin');
Route::patch('admins/{venue}', 'AdminController@update')->middleware('isAdmin');
Route::delete('admins/{venue}', 'AdminController@destroy')->middleware('isAdmin');

Route::post('venues/{venue}/rewards', 'VenueController@store')->middleware('isAdmin');
Route::post('venues/{venue}/createNews', 'VenueController@news')->middleware('isAdmin');
Route::get('venues/{venue}/createNews', 'VenueController@createNews')->middleware('isAdmin');
Route::get('venues/{venue}/news', 'VenueController@showNews')->middleware('isAdmin');
Route::get('venues/{venue}/info', 'VenueController@info')->middleware('isAdmin');








Route::get('rewards/{venue}/createReward', 'RewardController@create')->middleware('isAdmin');
Route::post('rewards/{venue}', 'RewardController@store')->middleware('isAdmin');
Route::get('rewards/{reward}/edit', 'RewardController@edit')->middleware('isAdmin');
Route::delete('rewards/{reward}', 'RewardController@destroy')->middleware('isAdmin');
Route::patch('rewards/{reward}', 'RewardController@update')->middleware('isAdmin');




Route::get('users/', 'UserController@index')->middleware('isAdmin');
Route::post('users/{user}/{venue}', 'UserController@show')->middleware('isAdmin');
Route::patch('users/{user}', 'UserController@update')->middleware('isAdmin');
Route::post('users/{venue}/stats', 'UserController@stats')->middleware('isAdmin');







Route::get('/home', 'HomeController@index')->name('home');
