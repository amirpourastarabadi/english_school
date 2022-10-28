<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class AnswerQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::factory(100)
            ->create()
            ->each(function (Question $question) {
                Answer::factory(3)->create(['is_correct' => false])->attach($question->getKey());
                Answer::factory()->create(['is_correct' => true])->attach($question->getKey());
            });
    }
}
