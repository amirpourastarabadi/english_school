<?php

namespace App\Models;

use App\Models\Accessors\GlobalAccessors\HumanReadableDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Exam extends Model
{
    use HasFactory, HumanReadableDate;

    protected $guarded = [];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function getNumberOfQuestionsAttribute()
    {
        return $this->questions()->count();
    }

    public function getNumberOfStudentsTakeItAttribute()
    {
        return $this->students()->count();
    }
}
