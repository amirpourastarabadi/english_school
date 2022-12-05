<?php

namespace App\Models\Relations;

use App\Models\Exam;
use App\Models\Teacher;

trait CourseRelations
{
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
