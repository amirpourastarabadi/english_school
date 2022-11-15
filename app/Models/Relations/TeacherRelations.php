<?php

namespace App\Models\Relations;

use App\Models\Course;
use App\Models\Exam;

trait TeacherRelations
{
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function exams()
    {
        return $this->hasManyThrough(Exam::class, Course::class, 'teacher_id', 'course_id', 'id', 'id');
    }
}