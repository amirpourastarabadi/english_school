<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{

    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body' => $this->faker->text(random_int(150, 200)),
        ];
    }

    public function withRandomType()
    {
        $types = ['multiple_choice', 'blank'];

        return $this->state([
            'type' => $types[random_int(0, 1)]
        ]);
    }
}
