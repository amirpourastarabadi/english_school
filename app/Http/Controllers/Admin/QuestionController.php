<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Questions\CreateQuestion;
use App\Models\Admin;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function show(Question $question)
    {
        return view('admin.questions.show', ['admin' => Admin::first(),'question' => $question]);
    }
}
