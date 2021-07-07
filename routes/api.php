<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IoController;
use App\Http\Controllers\PartnerController;
use App\Models\Io;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;



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

Route::get('/csv', function () {
    $table = Io::all();
    $output = '';
    foreach ($table as $row) {
        $output .= implode(",", $row->toArray());
    }
    $headers = array(
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="ExportFileName.csv"',
    );

    return Response::make(rtrim($output, "\n"), 200, $headers);
})->name('csv');
Route::resource('ios',IoController::class) ;

Route::group([
    'middleware' => 'auth:api',
], function () {
    Route::resource('ios',IoController::class, ['only' => ['store']]) ;
});

Route::group(['prefix'=> 'auth', 'namespace' => 'Auth'], function (){
    Route::post('register', [RegisterController::class, 'registerUser']);
    Route::get('signup/activate/{token}', [RegisterController::class, 'signupActivate']);
    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        Route::get('logout', [LoginController::class, 'logout']);
        Route::get('user', [UserController::class,'show']);
        Route::post('update', [UserController::class,'update']);
        Route::post('index', [UserController::class,'index']);

    });
});
//Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::post('/contact', [ContactController::class, 'store']);
Route::resource('/partners', PartnerController::class);

