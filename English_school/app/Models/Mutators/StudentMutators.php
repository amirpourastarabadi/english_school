<?php

namespace App\Models\Mutators;

use Illuminate\Support\Facades\Hash;

trait StudentMutators
{
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }
}