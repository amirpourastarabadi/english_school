<?php

use App\Http\Controllers\Api\V1\Teachers\Answers\AnswerController;
use App\Http\Controllers\Api\V1\Teachers\Auth\LoginController;
use App\Http\Controllers\Api\V1\Teachers\Auth\RegisterController;
use App\Http\Controllers\Api\V1\Teachers\Courses\CourseController;
use App\Http\Controllers\Api\V1\Teachers\Exams\ExamController;
use App\Http\Controllers\Api\V1\Teachers\Question\QuestionController;
use App\Http\Controllers\Api\V1\Teachers\QuestionType\QuestionTypeController;
use Illuminate\Support\Facades\Route;

/** authentication */
Route::post('register', RegisterController::class)->name('register');
Route::post('login', LoginController::class)->name('login');
/** end authentication */

Route::group(['middleware' => ['auth:sanctum', 'abilities:teachers']], function () {
    /** courses */
    Route::apiResource('courses', CourseController::class);
    /** end courses */

    /** courses */
    Route::apiResource('courses.exams', ExamController::class);
    /** end courses */

    /** Question Types */
    Route::apiResource('question-types', QuestionTypeController::class);
    /** end Question Types */

    /** Questions  */
    Route::apiResource('exams.questions', QuestionController::class);
    /** end Questions */

    /** Questions  */
    Route::apiResource('exams.questions.answers', AnswerController::class);
    /** end Questions */
});
