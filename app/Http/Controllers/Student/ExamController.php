<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Exam;

class ExamController extends Controller
{
    public function show(Exam $exam)
    {
        $exam->load('questions');
        $multiselect_questions = $exam->questions->where('type', '=', 'multiple_choice');
        $blank_questions = $exam->questions->where('type', '=', 'blank');

        return view('students.exams.show', compact('exam', 'multiselect_questions', 'blank_questions'));
    }
}
