<?php

use App\Http\Controllers\Student\ExamController;
use Illuminate\Support\Facades\Route;

Route::get('/exams/{exam}', [ExamController::class, 'show'])->name('exams.show');
Route::post('/exams/{exam}', [ExamController::class, 'submit'])->name('exams.submit');
