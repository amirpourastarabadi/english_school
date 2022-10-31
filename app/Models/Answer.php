<?php

namespace App\Models;

use App\Models\Accessors\GlobalAccessors\HumanReadableDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory, HumanReadableDate;

    protected $table = 'answers';

    protected $gaurded = [];

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'answer_question')->withPivot('is_correct');
    }
}
