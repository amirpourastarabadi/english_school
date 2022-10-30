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
        return view('admin.exams.show', ['exam' => $exam, 'admin' => Admin::first()]);
    }

    public function create()
    {
        return view('admin.exams.create',['admin' => Admin::first()]);
    }

    public function store(CreateExam $request)
    {
        $exam = Exam::create($request->validated());

        return view('admin.exams.show', ['exam' => $exam, 'admin' => Admin::first()]);
    }
}
