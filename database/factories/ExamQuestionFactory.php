<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\ExamQuestoin;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamQuestionFactory extends Factory
{
    protected $model = ExamQuestoin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exam_id' => Exam::factory(),
            'question_id' => Question::factory()
        ];
    }
}
