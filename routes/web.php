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

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function() {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::group([
        'prefix'    => 'admin',
        'namespace' => 'Admin'
    ], function (){
        Route::get('/', 'DashboardController@index')->name('admin');
        Route::resource('/languages', 'LanguagesController');
        Route::get('/languages/toggle/{id}', 'LanguagesController@toggle');
        Route::resource('/contents', 'ContentController');
        Route::get('/contents/toggle/{id}', 'ContentController@toggle');
        Route::resource('/menus', 'MenusController');
        Route::get('/menus/toggle/{id}', 'MenusController@toggle');
        Route::resource('/statuses', 'StatusesController');
        Route::resource('/modelings', 'ModelingOrderController');
        Route::resource('/users', 'UsersController');
        Route::resource('/printings', 'PrintingOrderController');
    });

});
