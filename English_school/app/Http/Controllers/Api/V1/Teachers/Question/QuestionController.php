<?php

namespace App\Http\Controllers\Api\V1\Teachers\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Teachers\Questions\CreateRequest;
use App\Http\Requests\Api\V1\Teachers\Questions\UpdateRequest;
use App\Http\Resources\Api\V1\Teachers\Questions\QuestionResource;
use App\Models\Exam;
use App\Models\Question;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Question::class, 'question');
    }
    public function index(Exam $exam)
    {
        $questions = $exam->questions;

        return QuestionResource::make($questions);
    }

    public function store(CreateRequest $request, Exam $exam)
    {
        $question = $exam->questions()->create($request->validated());

        return QuestionResource::make($question);
    }

    public function show(Exam $exam, Question $question)
    {
        return QuestionResource::make($question);
    }

    public function update(UpdateRequest $request, Exam $exam, Question $question)
    {
        $question->update($request->validated());

        return QuestionResource::make($question);
    }

    public function destroy(Exam $exam, Question $question)
    {
        $question->delete();

        return response()->json(['message' => "Question {$question->id} deleted successfully."]);
    }
}
