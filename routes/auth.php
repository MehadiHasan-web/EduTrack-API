<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;



Route::post('login', [LoginController::class, 'Login']);


Route::group(['middleware' => 'auth:sanctum'], static function () {
    Route::post('logout', [LoginController::class, 'Logout']);
});
