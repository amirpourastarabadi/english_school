<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function show(Exam $exam)
    {
        $exam->load('questions.answers');
        
        $multiselect_questions = $exam->questions->where('type', '=', 'multiple_choice');
        
        $blank_questions = $exam->questions->where('type', '=', 'blank');

        return view('students.exams.show', compact('exam', 'multiselect_questions', 'blank_questions'));
    }

    public function submit(Request $request)
    {
        dd($request->all());
    }
}
