<?php

namespace App\Models;

use App\Models\Accessors\GlobalAccessors\HumanReadableDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory, HumanReadableDate;

    protected $table = 'questions';

    public function answers()
    {
        return $this->belongsToMany(Answer::class, 'answer_question')->withPivot('is_correct');
    }
}
