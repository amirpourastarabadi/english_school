<?php

namespace App\Models\Relations;

use App\Models\AnswerSheet;
use App\Models\Course;
use App\Models\Exam;

trait StudentRelations
{
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class)->withPivot('started_at');
    }

    public function answerSheets()
    {
        return $this->hasMany(AnswerSheet::class);
    }
}