<?php

namespace App\Http\Controllers\Api\V1\Teachers\Courses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Teachers\Courses\CreateRequest;
use App\Http\Resources\Api\V1\Teachers\Courses\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index()
    {
        //
    }


    public function store(CreateRequest $request)
    {
        $course = Course::create([
            'title' => $request->get('title'),
            'teacher_id' => auth()->id(),
        ]);

        return CourseResource::make($course);
    }

    public function show(Course $id)
    {
        //
    }

    public function update(Request $request, Course $id)
    {
        //
    }

    public function destroy(Course $id)
    {
        //
    }
}
