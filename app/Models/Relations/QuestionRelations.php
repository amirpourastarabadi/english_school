<?php

namespace App\Models\Relations;

use App\Models\Answer;
use App\Models\Exam;

trait QuestionRelations
{
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
