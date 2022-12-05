<?php

use App\Http\Controllers\Api\V1\Students\Auth\LoginController;
use App\Http\Controllers\Api\V1\Students\Auth\RegisterController;
use App\Http\Controllers\Api\V1\Students\Courses\CourseController;
use App\Http\Controllers\Api\V1\Students\Exams\ExamController;
use Illuminate\Support\Facades\Route;

/** authentication */
Route::post('register', RegisterController::class)->name('register');
Route::post('login', LoginController::class)->name('login');
/** end authentication */



Route::group(['middleware' => ['auth:sanctum', 'abilities:students']], function(){
    
    /** courses */
    Route::get('courses', [CourseController::class, 'index']);
    Route::post('courses/{course}', [CourseController::class, 'enroll']);
    Route::delete('courses/{course}', [CourseController::class, 'leave']);
    /** end courses */

    /** exams */
    Route::get('/courses/{course}/exams', [ExamController::class, 'index']);
    Route::post('/courses/{course}/exams/{exam}/take', [ExamController::class, 'takeExam']);
    Route::post('/courses/{course}/exams/{exam}/finish', [ExamController::class, 'finishExam']);
    /** end exams */

});

