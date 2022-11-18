<?php

namespace App\Models\Relations;

use App\Models\Exam;

trait QuestionRelations
{
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
