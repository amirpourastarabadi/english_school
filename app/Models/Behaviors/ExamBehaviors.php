<?php

namespace App\Models\Behaviors;

use App\Models\Teacher;

trait ExamBehaviors
{
    public function doesBelongsTo(Teacher $teacher)
    {
        return $this->teacher->id === $teacher->id;
    }
}