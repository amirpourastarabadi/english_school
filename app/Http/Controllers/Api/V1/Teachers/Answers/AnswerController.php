<?php

namespace App\Http\Controllers\Api\V1\Teachers\Answers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Teachers\Answers\CreateRequest;
use App\Http\Requests\Api\V1\Teachers\Answers\UpdateRequest;
use App\Http\Resources\Api\V1\Teachers\Answers\AnswerResource;
use App\Models\Answer;
use App\Models\Exam;
use App\Models\Question;

class AnswerController extends Controller
{

    public function index(Exam $exam, Question $question)
    {
        $answers = $question->answers;

        return AnswerResource::make($answers);
    }

    public function store(CreateRequest $request, Exam $exam, Question $question)
    {
        $answer = $question->answers()->create($request->validated());

        return AnswerResource::make($answer);
    }

    public function show(Exam $exam, Question $question, Answer $answer)
    {
        return AnswerResource::make($answer);
    }

    public function update(UpdateRequest $request, Exam $exam, Question $question, Answer $answer)
    {
        $answer->update($request->validated());

        return AnswerResource::make($answer);
    }

    public function destroy(Exam $exam, Question $question, Answer $answer)
    {
        $answer->delete();

        return response()->json(['message' => "answer {$answer->body} deleted successfully."]); 
    }
}
