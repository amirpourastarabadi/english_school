<?php

namespace App\Models\Accessors\GlobalAccessors;

trait HumanReadableDate
{
    public function getHumanReadableCreatedAtAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getHumanReadableUpdatedAtAttribute()
    {
        return $this->updated_at->diffForHumans();
    }
}