<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\IoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SignInController;



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
Route::resource('ios',IoController::class) ;

Route::group([
    'middleware' => 'auth:api',
], function () {
    Route::resource('ios',IoController::class, ['only' => ['store']]) ;
});

Route::group(['prefix'=> 'auth', 'namespace' => 'Auth'], function (){
    Route::post('signIn', [SignInController::class, 'signIn']);
    Route::post('register', [RegisterController::class, 'registerUser']);
    Route::get('signup/activate/{token}', [RegisterController::class, 'signupActivate']);
    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        Route::get('user', [LoginController::class, 'user']);
        Route::get('logout', [LoginController::class, 'logout']);
    });

    //Route::post('signout', 'SignOutController');
    //Route::get('me', 'MeController');
});
//Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
