<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Questions\CreateQuestion;
use App\Models\Admin;
use App\Models\Exam;
use App\Models\Question;

class ExamQuestionsController extends Controller
{
    public function index(Exam $exam)
    {
        return view('admin.exams.show', ['exam' => $exam, 'admin' => Admin::first()]);
    }

    public function show(Exam $exam, Question $question)
    {
        return view('admin.questions.show', ['admin' => Admin::first(), 'question' => $question]);
    }

    public function create(Exam $exam)
    {
        return view('admin.questions.create', ['admin' => Admin::first(), 'exam' => $exam]);
    }

    public function store(CreateQuestion $request, Exam $exam)
    {
        $exam->questions()->create($request->validated());
        
        return redirect(route('admin.exams.show', $exam));
    }
}
