<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Exams\CreateExam;
use App\Models\Admin;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        return view('admin.exams.index', ['exams' => Exam::all(), 'admin' => Admin::first()]);
    }

    public function show(Exam $exam)
    {
        $exam->load('questions.answers');
        
        $multiselect_questions = $exam->questions->where('type', '=', 'multiple_choice');
        
        $blank_questions = $exam->questions->where('type', '=', 'blank');
        
        $admin = Admin::first();

        return view('admin.exams.show', compact('admin', 'exam', 'multiselect_questions', 'blank_questions'));
    }

    public function create()
    {
        return view('admin.exams.create',['admin' => Admin::first()]);
    }

    public function store(CreateExam $request)
    {
        $exam = Exam::create($request->validated());

        return redirect(route('admin.exams.show', $exam));
    }
}
