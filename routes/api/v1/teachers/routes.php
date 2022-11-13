<?php

use App\Http\Controllers\Api\V1\Teachers\Auth\LoginController;
use App\Http\Controllers\Api\V1\Teachers\Auth\RegisterController;
use App\Http\Controllers\Api\V1\Teachers\Courses\CourseController;
use Illuminate\Support\Facades\Route;

/** authentication */
Route::post('register', RegisterController::class)->name('register');
Route::post('login', LoginController::class)->name('login');
/** end authentication */

/** courses */
Route::apiResource('courses', CourseController::class)->middleware(['auth:sanctum', 'abilities:teachers']);
/** end courses */