<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $gaurded = [];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'exam_question');
    }
}
