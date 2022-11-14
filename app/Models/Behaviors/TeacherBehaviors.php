<?php

namespace App\Models\Behaviors;

trait TeacherBehaviors
{
    public function deleteSanctumTokens(string $token_name)
    {
        $this->tokens()->where('name', $token_name)->delete();
    }
}