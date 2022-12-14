<?php

namespace App\Models;

use App\Models\Relations\CourseRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    use CourseRelations;

    protected $fillable = [
        'cost',
        'title',
        'book_id',
        'teacher_id',
        'category_id',
    ];

    protected $casts = [
        'cost' => 'integer',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];


}
