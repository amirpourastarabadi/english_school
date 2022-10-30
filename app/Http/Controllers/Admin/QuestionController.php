<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function show(Question $question)
    {
        return "QuestionController@show is Under Construct";
    }

    public function create()
    {
        return "QuestionController@create is Under Construct";
    }
}
