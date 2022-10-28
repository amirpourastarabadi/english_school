<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question_id' => Question::factory(),
            'answer_id' => Answer::factory(),
        ];
    }
}
