<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=> 'auth', 'namespace' => 'Auth'], function (){
    Route::post('signIn', [SignInController::class, 'signIn']);
    Route::post('register', [RegisterController::class, 'registerUser']);
    Route::get('signup/activate/{token}', [RegisterController::class, 'signupActivate']);

    //Route::post('signout', 'SignOutController');
    //Route::get('me', 'MeController');
});
//Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
