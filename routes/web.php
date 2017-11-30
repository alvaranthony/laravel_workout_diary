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

/*
Route::get('/', function () {
    return view('pages.index');
});
*/

// Controllers for about and main page
Route::get('/', "PagesController@index");
Route::get('/about', "PagesController@about");

//Controllers for pages related with workouts 
Route::resource('workouts', 'WorkoutsController');

//Authentication controller
Auth::routes();

//Controller for dashboard
Route::get('/dashboard', 'DashboardController@index');

//Controller for tags
Route::get('/tags', 'TagsController@index');
