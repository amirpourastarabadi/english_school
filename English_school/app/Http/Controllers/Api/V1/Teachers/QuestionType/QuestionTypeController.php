<?php

namespace App\Http\Controllers\Api\V1\Teachers\QuestionType;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Teachers\QuestionTypes\UpdateRequest;
use App\Http\Requests\Api\V1\Teachers\QuestionTypes\CreateRequest;
use App\Http\Resources\Api\V1\Teachers\QuestionType\QuestionTypeResource;
use App\Models\QuestionType;

class QuestionTypeController extends Controller
{

    public function index()
    {
        $questionTypes = QuestionType::all();

        return QuestionTypeResource::make($questionTypes);
    }

    public function store(CreateRequest $request)
    {
        $questionType = QuestionType::create($request->validated());

        return QuestionTypeResource::make($questionType);
    }

    public function show(QuestionType $questionType)
    {
        return QuestionTypeResource::make($questionType);
    }

    public function update(UpdateRequest $request, QuestionType $questionType)
    {
        $questionType->update($request->validated());
        return QuestionTypeResource::make($questionType);
    }

    public function destroy(QuestionType $questionType)
    {
        $questionType->delete();
        
        return response()->json(['message' => "{$questionType->title} deleted successfully."]);
    }
}
