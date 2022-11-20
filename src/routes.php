<?php

use Illuminate\Support\Facades\Route;
use \Acitjazz\LaravelStagingMode\Http\Controllers\StagingController;
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

if(env('APP_ENV') == 'staging'){
    Route::group(['middleware' => ['web']], function () {
        Route::get(config('laravelstagingmode.login_route'), [StagingController::class, 'index'])->name('staging.index');
        Route::post('/staging/login', [StagingController::class, 'login'])->name('staging.login');
        Route::get(config('laravelstagingmode.logout_route'), [StagingController::class, 'logout'])->name('staging.logout');
    });
}