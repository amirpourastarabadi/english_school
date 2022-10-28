<?php

use App\Http\Controllers\Student\ExamController;
use Illuminate\Support\Facades\Route;

Route::get('exams/{exam}', [ExamController::class, 'show'])->name('exams.show');
