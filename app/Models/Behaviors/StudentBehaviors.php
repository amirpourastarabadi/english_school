<?php

namespace App\Models\Behaviors;

use App\Models\Course;

trait StudentBehaviors
{
    public function deleteSanctumTokens(string $token_name)
    {
        $this->tokens()->where('name', $token_name)->delete();
    }

    public function enroll(Course $course)
    {
        if (!$this->courses->contains($course)) {
            $this->courses()->attach($course);
        }
    }

    public function leave(Course $course)
    {
        if ($this->courses->contains($course)) {
            $this->courses()->detach($course);
        }
    }
}
