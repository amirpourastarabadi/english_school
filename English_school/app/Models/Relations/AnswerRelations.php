<?php

namespace App\Models\Relations;

use App\Models\Question;

trait AnswerRelations
{
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
