<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Teacher;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeachearsExamPolicy
{
    use HandlesAuthorization;

    public function viewAny(Teacher $teacher)
    {
        return $teacher->courses->contains(request()->route()->course);
    }

    public function view(Teacher $teacher, Exam $exam)
    {
        return $exam->doesBelongsTo($teacher);
    }

    public function create(Teacher $teacher)
    {
        return $teacher->courses->contains(request()->route()->course);
    }

    public function update(Teacher $teacher, Exam $exam)
    {
        return $exam->doesBelongsTo($teacher);
    }

    public function delete(Teacher $teacher, Exam $exam)
    {
        return $exam->doesBelongsTo($teacher);
    }

    public function restore(Teacher $teacher, Exam $exam)
    {
        return $exam->doesBelongsTo($teacher);
    }

    public function forceDelete(Teacher $teacher, Exam $exam)
    {
        return $exam->doesBelongsTo($teacher);
    }
}
