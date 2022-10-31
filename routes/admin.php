<?php

use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\ExamQuestionsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\QuestionAnswersController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index']);

// student routes
Route::get('students', [StudentController::class, 'index'])->name('students.index');
Route::get('students/{student}', [StudentController::class, 'show'])->name('students.show');
// end of student routes

// exam routes
Route::get('exams', [ExamController::class, 'index'])->name('exams.index');
Route::post('exams', [ExamController::class, 'store'])->name('exams.store');
Route::get('exams/create', [ExamController::class, 'create'])->name('exams.create');
Route::get('exams/{exam}', [ExamController::class, 'show'])->name('exams.show');
// end of exam routes

// question routes
Route::get('questions/{question}', [QuestionController::class, 'show'])->name('questions.show');
Route::get('questions/{?type}', [QuestionController::class, 'index'])->name('questions.type.index');

// end of question routes

// exam questions routes
Route::get('exam/{exam}/questions', [ExamQuestionsController::class, 'index'])->name('exams.questions.index');
Route::get('exam/{exam}/questions/create', [ExamQuestionsController::class, 'create'])->name('exams.questions.create');
Route::get('exam/{exam}/questions/{question}', [ExamQuestionsController::class, 'show'])->name('exams.questions.show');
Route::post('exam/{exam}/questions', [ExamQuestionsController::class, 'store'])->name('exams.questions.store');

// question answers routes
Route::get('questions/{question}/answers/create', [QuestionAnswersController::class, 'create'])->name('questions.answers.create');
Route::get('questions/{question}/answers/{answer}', [QuestionAnswersController::class, 'show'])->name('questions.answers.show');
Route::post('questions/{question}/answers', [QuestionAnswersController::class, 'store'])->name('questions.answers.store');

Route::get('answers/{answer}', [AnswerController::class, 'show'])->name('answers.show');
Route::get('answers/{question}/create', [AnswerController::class, 'create'])->name('answers.create');
Route::post('answers/{question}', [AnswerController::class, 'store'])->name('answers.store');
