<?php

namespace App\Models\Relations;

use App\Models\Course;

trait StudentRelations
{
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}