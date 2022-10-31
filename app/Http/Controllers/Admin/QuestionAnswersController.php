<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionAnswersController extends Controller
{
    public function show(Question $question, Answer $answer)
    {
        return "QuestionAnswersController@show under construct";
    }


    public function create(Question $question)
    {
        return view('admin.answers.create', ['admin' => Admin::first(), 'question' => $question]);
    }

    public function store(Question $question)
    {
        return "QuestionAnswersController@store under construct";
    }
}
