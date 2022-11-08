<?php

use App\Http\Controllers\Api\V1\Students\Auth\LoginController;
use App\Http\Controllers\Api\V1\Students\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/** authentication */
Route::post('register', RegisterController::class)->name('register');
Route::post('login', LoginController::class)->name('login');
/** end authentication */
