<?php

namespace App\Http\Controllers\Api\V1\Students\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Http\Resources\Api\V1\Students\Courses\CourseResource;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with(['exams', 'teacher'])->get();

        return CourseResource::make($courses);
    }
    
}
