<?php

namespace App\Models\Relations;

use App\Models\Course;

trait TeacherRelations
{
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}