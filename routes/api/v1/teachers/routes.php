<?php

use App\Http\Controllers\Api\V1\Teachers\Auth\LoginController;
use App\Http\Controllers\Api\V1\Teachers\Auth\RegisterController;
use App\Http\Controllers\Api\V1\Teachers\Courses\CourseController;
use App\Http\Controllers\Api\V1\Teachers\Exams\ExamController;
use Illuminate\Support\Facades\Route;

/** authentication */
Route::post('register', RegisterController::class)->name('register');
Route::post('login', LoginController::class)->name('login');
/** end authentication */

/** courses */
Route::apiResource('courses', CourseController::class)->middleware(['auth:sanctum', 'abilities:teachers']);
/** end courses */

/** courses */
Route::apiResource('courses.exams', ExamController::class)->middleware(['auth:sanctum', 'abilities:teachers']);
/** end courses */