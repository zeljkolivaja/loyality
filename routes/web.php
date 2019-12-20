
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Route::resource('admins', 'AdminController')->middleware('isAdmin');
Route::resource('rewards', 'RewardController');
Route::get('admins/','AdminController@index')->middleware('isAdmin');
Route::post('admins/','AdminController@store')->middleware('isAdmin');
Route::get('admins/create','AdminController@create')->middleware('isAdmin');
Route::post('venues/{venue}/rewards', 'VenueController@store')->middleware('isAdmin');
Route::get('admins/{venue}/show', 'AdminController@show')->middleware('isAdmin');
Route::get('admins/{venue}/edit', 'AdminController@edit')->middleware('isAdmin');
Route::patch('admins/{venue}', 'AdminController@update')->middleware('isAdmin');





Route::get('/home', 'HomeController@index')->name('home');
