<?php

use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index']);
Route::get('students', [StudentController::class, 'index'])->name('students.index');
Route::get('students/{student}', [StudentController::class, 'show'])->name('students.show');


Route::get('exams', [ExamController::class, 'index'])->name('exams.index');
Route::post('exams', [ExamController::class, 'store'])->name('exams.store');
Route::get('exams/create', [ExamController::class, 'create'])->name('exams.create');
Route::get('exams/{exam}', [ExamController::class, 'show'])->name('exams.show');


Route::get('questions/{question}', [QuestionController::class, 'show'])->name('questions.show');
Route::get('questions/{?type}', [QuestionController::class, 'index'])->name('questions.type.index');
Route::get('questions/{?exam}/create', [QuestionController::class, 'create'])->name('question.create');