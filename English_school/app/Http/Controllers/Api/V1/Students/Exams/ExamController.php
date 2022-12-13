<?php

namespace App\Http\Controllers\Api\V1\Students\Exams;

use App\Http\Resources\Api\V1\Students\Exams\ExamResource;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Students\AnswerSheets\CreateRequest;
use App\Http\Resources\Api\V1\Students\Questions\QuestionResource;
use App\Models\Course;
use App\Models\Exam;
use Illuminate\Http\Response;

class ExamController extends Controller
{

    public function index(Course $course)
    {
        if(!is_null($course) && !auth()->user()->enrolledInCourse($course)){
            return response()->json(['message' => "You do not enroll in {$course->title}"], Response::HTTP_UNAUTHORIZED);
        }  
        $exams = $course->exams;

        return ExamResource::make($exams);
    }

    public function takeExam(Course $course, Exam $exam)
    {
        if(!is_null($course) && !auth()->user()->enrolledInCourse($course)){
            return response()->json(['message' => "You do not enroll in {$course->title}"], Response::HTTP_UNAUTHORIZED);
        }
        
        auth()->user()->startExam($exam);

        $questins = $exam->questions()->with('answers')->get();

        return QuestionResource::make($questins);
    }

    public function finishExam(CreateRequest $request, Course $course, Exam $exam)
    {
        if(!is_null($course) && !auth()->user()->enrolledInCourse($course)){
            return response()->json(['message' => "You do not enroll in {$course->title}"], Response::HTTP_UNAUTHORIZED);
        }

        $message = auth()->user()->finishExam($exam, $request->get('answers'));

        return response()->json(['message' => $message]);
    }
}
