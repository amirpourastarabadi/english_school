<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    public function answers()
    {
        return $this->belongsToMany(Answer::class, 'answer_question')->withPivot('is_correct');
    }
}
