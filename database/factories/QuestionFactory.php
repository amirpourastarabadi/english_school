<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\Question;
use App\Models\QuestionType;
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
            'exam_id' => Exam::factory(),
            'type_id' => optional(QuestionType::where('title', 'multiple_choice')->first())->getKey() ??
                         QuestionType::factory()->create(['title' => 'multiple_choice', 'id' => 1]),
        ];
    }

    public function withRandomType()
    {
        $types = ['multiple_choice', 'blank'];

        return $this->state([
            'type_id' => $types[random_int(0, 1)]
        ]);
    }

    public function forExam(Exam $exam)
    {
        return $this->state([
            'exam_id' => $exam->getKey()
        ]);
    }
}
