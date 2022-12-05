<?php

namespace App\Http\Controllers\Api\V1\Students\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Http\Resources\Api\V1\Students\Courses\CourseResource;

class CourseController extends Controller
{
    public function index()
    {
        $courses = auth()->user()->courses()->with(['exams', 'teacher'])->get();

        return CourseResource::make($courses);
    }

    public function enroll(Course $course)
    {
        auth()->user()->enroll($course);

        return response()->json(['message' => "you enrolled in {$course->title} successfully."]);
    }

    public function leave(Course $course)
    {
        auth()->user()->leave($course);

        return response()->json(['message' => "you left {$course->title} successfully."]);
    }
}
