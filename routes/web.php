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

Route::group(['middleware' => 'prevent-back-history'],function(){
  Auth::routes();
Route::get('/', function () {
    return view('login');
});


Route::resource('home','crudcontrl');

Route::post('login','crudcontrl@login');

Route::post('/user_reg','crudcontrl@user_reg');

Route::post('forgot','crudcontrl@forgot');


// Route::group(['middleware' => 'prevent-back-history'],function(){
// 	Auth::routes();
// 	Route::get('logout', 'crudcontrl@logout');
// });


  Route::get('logout', 'crudcontrl@logout');
});

//Route::get('logout','crudcontrl@logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
