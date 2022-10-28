<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $gaurded = [];

    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }
}