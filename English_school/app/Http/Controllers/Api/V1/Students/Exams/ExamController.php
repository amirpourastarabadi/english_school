<?php

namespace App\Http\Controllers\Api\V1\Students\Exams;

use App\Http\Resources\Api\V1\Students\Exams\ExamResource;
use App\Http\Controllers\Controller;
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

        $questins = $exam->questions;

        return QuestionResource::make($questins);
    }

    public function finishExam(Course $course, Exam $exam)
    {
        // todo: need to upload anwer sheet to this method

        if(!is_null($course) && !auth()->user()->enrolledInCourse($course)){
            return response()->json(['message' => "You do not enroll in {$course->title}"], Response::HTTP_UNAUTHORIZED);
        }

        auth()->user()->finishExam($exam);

        return response()->json(['message' => "Thanks, You can see the result in your profile."]);
    }
}
