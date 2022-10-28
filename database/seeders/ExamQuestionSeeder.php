<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Question;
use Illuminate\Database\Seeder;

class ExamQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exam::factory(10)
            ->create()
            ->each(function (Exam $exam) {
                $questions = Question::factory(random_int(10, 15))
                ->withRandomType()
                ->create();
                $exam->questions()->saveMany($questions);
            });
    }
}
