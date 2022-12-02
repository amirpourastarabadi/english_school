<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->text(random_int(5, 10)),
            'is_correct' => random_int(0, 1),
            'question_id' => Question::factory(),
        ];
    }
}
