<?php

namespace App\Models;

use App\Models\Relations\AnswerRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    use AnswerRelations;

    protected $fillable = [
        'question_id',
        'is_correct',
        'body',
    ];

    protected $cast = [
        'is_correct' => 'boolean',
    ];
}
