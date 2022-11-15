<?php

namespace App\Http\Controllers\Api\V1\Teachers\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Teachers\Courses\CreateRequest;
use App\Http\Requests\Api\V1\Teachers\Courses\UpdateRequest;
use App\Http\Resources\Api\V1\Teachers\Courses\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Course::class, 'course');
    }

    public function index()
    {
        $courses = auth()->user()->courses;

        return CourseResource::make($courses);
    }


    public function store(CreateRequest $request)
    {
        $course = Course::create([
            'title' => $request->get('title'),
            'teacher_id' => auth()->id(),
        ]);

        return CourseResource::make($course);
    }

    public function show(Course $course)
    {
        return CourseResource::make($course);
    }

    public function update(UpdateRequest $request, Course $course)
    {
        $course->update($request->validated());
        
        return CourseResource::make($course);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json(['message' => "course {$course->title} delete successfully."]);
    }
}
