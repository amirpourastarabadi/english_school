<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\Exams\CreateAnswersheet;
use App\Models\Answersheet;
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

    public function submit(CreateAnswersheet $request)
    {
        Answersheet::insert($request->validated()['answersheet']);
    }
}
