<?php

namespace App\Http\Controllers\Api\V1\Teachers\Exams;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Teachers\Exams\CreateRequest;
use App\Http\Requests\Api\V1\Teachers\Exams\UpdateRequest;
use App\Http\Resources\Api\V1\Teachers\ExamResource;
use App\Models\Course;
use App\Models\Exam;

class ExamController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource([Exam::class], 'course');
    }

    public function index(Course $course)
    {
        $exams = $course->exams;

        return ExamResource::make($exams);
    }

    public function store(CreateRequest $request, Course $course)
    {
        $exam = $course->exams()->create($request->validated());

        return ExamResource::make($exam);
    }

    public function show(Course $course, Exam $exam)
    {
        $exam = $course->exams()->where('id', $exam->id)->firstOrFail();

        return ExamResource::make($exam);
    }

    public function update(UpdateRequest $request, Course $course, Exam $exam)
    {
        $exam = $course->exams()->where('id', $exam->id)->firstOrFail();

        $exam->update($request->validated());
        
        return ExamResource::make($exam);
    }

    public function destroy(Course $course, Exam $exam)
    {
        $exam = $course->exams()->where('id', $exam->id)->firstOrFail();
        
        $exam->delete();

        return response()->json(['message' => "course {$exam->title} deleted successfully."]); 
    }
}
