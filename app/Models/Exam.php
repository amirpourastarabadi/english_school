<?php

namespace App\Models;

use App\Models\Behaviors\ExamBehaviors;
use App\Models\Relations\ExamRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
    use HasFactory, SoftDeletes;
    use ExamRelations, ExamBehaviors;

    protected $fillable = [
        'title',
        'course_id'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];
}
