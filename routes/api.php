<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('v1')->group(function () {
    Route::group(['prefix' => '/auth', ['middleware' => 'throttle:20,5']], function(){
        Route::post('/register', 'Auth\RegisterController@register');
        Route::post('/login', 'Auth\LoginController@login');
        // Send reset password mail
        Route::post('reset-password', 'AuthController@sendPasswordResetLink');
        // handle reset password form process
        Route::post('reset/password', 'AuthController@callResetPassword');
    });

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('/user', 'MeController@index');
        Route::get('/auth/logout', 'MeController@logout');
    });

    Route::group(['prefix' => '/page', ['middleware' => 'throttle:20,5']], function () {
        Route::post('/contents', 'Pages\ContentPageController@content');
        Route::post('/menus', 'Pages\MenuPageController@menu');
        Route::get('/languages', 'Pages\languagesController@index');
    });

    Route::group(['prefix' => '/order', ['middleware' => 'throttle:20,5']], function () {
        Route::post('/modeling', 'Orders\ModelingOrderController@store');
        Route::get('/verify/{token}', 'Orders\ModelingOrderController@verify')->name('modelingOrder.verify');
        Route::post('/countries', 'Orders\CountryListController@index');
        Route::post('/masks', 'Orders\CountryListController@mask');
//        Route::post('/printing', 'Orders\PrintingOrderController@store');
//        Route::post('/painting', 'Orders\PaintingOrderController@store');
    });
});
