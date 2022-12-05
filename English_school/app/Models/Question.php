<?php

namespace App\Models;

use App\Models\Relations\QuestionRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;
    use QuestionRelations;

    protected $fillable = [
        'problem_description',
        'exam_id',
        'question_type_id',
        'picture',
        'score',
    ];
}
