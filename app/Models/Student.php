<?php

namespace App\Models;

use App\Models\Behaviors\StudentBehaviors;
use App\Models\Mutators\StudentMutators;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    use HasFactory, HasApiTokens;
    use StudentMutators, StudentBehaviors;

    protected $fillable = [
        'mobile',
        'password',
        'first_name',
        'last_name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
}
