
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


Route::group(['middleware' => ['isAdmin']], function () {

    //admin routes
    Route::get('admins/', 'AdminController@index');
    Route::post('admins/', 'AdminController@store');
    Route::get('admins/create', 'AdminController@create');
    Route::get('admins/{venue}/show', 'AdminController@show');
    Route::get('admins/{venue}/edit', 'AdminController@edit');
    Route::patch('admins/{venue}', 'AdminController@update');
    Route::delete('admins/{venue}', 'AdminController@destroy');
    Route::get('admins/{venue}/stats', 'AdminController@stats');


    Route::post('venues/{venue}/rewards', 'VenueController@store');
    Route::post('venues/{venue}/createNews', 'VenueController@news');
    Route::get('venues/{venue}/createNews', 'VenueController@createNews');
    Route::get('venues/{venue}/info', 'VenueController@info');

    Route::get('rewards/{venue}/createReward', 'RewardController@create');
    Route::post('rewards/{venue}', 'RewardController@store');
    Route::get('rewards/{reward}/edit', 'RewardController@edit');
    Route::delete('rewards/{reward}', 'RewardController@destroy');
    Route::patch('rewards/{reward}', 'RewardController@update');

    Route::get('users/', 'UserController@index');
    Route::post('users/{user}/{venue}', 'UserController@show');
    Route::patch('users/{user}', 'UserController@update');
    Route::post('users/{venue}/stats', 'UserController@stats');


    Route::get('stats/{venue}', 'UserController@stats');
});



Route::get('venues/{venue}/news', 'VenueController@showNews');
Route::get('/', 'VisitorController@index');

















Route::get('/home', 'HomeController@index')->name('home');
