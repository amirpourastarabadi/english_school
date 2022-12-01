<?php

use App\Http\Controllers\Api\V1\Students\Auth\LoginController;
use App\Http\Controllers\Api\V1\Students\Auth\RegisterController;
use App\Http\Controllers\Api\V1\Students\Courses\CourseController;
use Illuminate\Support\Facades\Route;

/** authentication */
Route::post('register', RegisterController::class)->name('register');
Route::post('login', LoginController::class)->name('login');
/** end authentication */



/** courses */
//pick a course
Route::group(['middleware' => ['auth:sanctum', 'abilities:students']], function(){
    Route::get('courses', [CourseController::class, 'index']);
    Route::post('courses/{course}', [CourseController::class, 'enroll']);
    Route::delete('courses/{course}', [CourseController::class, 'leave']);
});
/** end courses */

