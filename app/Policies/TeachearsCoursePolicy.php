<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeachearsCoursePolicy
{
    use HandlesAuthorization;


    public function viewAny(Teacher $teacher)
    {
        return true;
    }

    public function view(Teacher $teacher, Course $course)
    {
        return $course->teacher_id == $teacher->id;
    }

    public function create(Teacher $teacher)
    {
        return true;
    }

    public function update(Teacher $teacher, Course $course)
    {
        return $course->teacher_id == $teacher->id;
    }

    public function delete(Teacher $teacher, Course $course)
    {
        return $course->teacher_id == $teacher->id;
    }

    public function restore(Teacher $teacher, Course $course)
    {
        return $course->teacher_id == $teacher->id;
    }

    public function forceDelete(Teacher $teacher, Course $course)
    {
        return $course->teacher_id == $teacher->id;
    }
}
