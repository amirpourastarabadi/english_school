<?php

namespace Database\Factories;

use App\Models\Answer;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{

    protected $model = Answer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->text(random_int(10, 20))
        ];
    }
}
