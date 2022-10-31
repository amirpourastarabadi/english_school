<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function create(Question $question)
    {
        return view('admin.answers.create', ['admin' => Admin::first(), 'question' => $question]);
    }

    public function store(Question $question)
    {
        return "AnswerController@store under construct";
    }
}
