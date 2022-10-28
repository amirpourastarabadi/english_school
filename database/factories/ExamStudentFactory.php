<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\ExamStudent;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamStudentFactory extends Factory
{

    protected $model = ExamStudent::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id' => Student::factory(),
            'exam_id' => Exam::factory(),
            'score' => random_int(0, 100),
            'take_at' => now()
        ];
    }
}
