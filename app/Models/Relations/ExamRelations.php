<?php

namespace App\Models\Relations;

use App\Models\Course;
use App\Models\Question;
use App\Models\Teacher;

trait ExamRelations
{
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function teacher()
    {
        return $this->course->teacher();
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}