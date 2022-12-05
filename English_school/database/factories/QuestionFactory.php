<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\QuestionType;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'problem_description' => $this->faker->text(random_int(50, 80)),
            'exam_id'             => Exam::factory(),
            'question_type_id'    => optional(QuestionType::first())->getKey() ?? QuestionType::factory(),
            'score'               => random_int(1, 5) * 1.0
        ];
    }
}
