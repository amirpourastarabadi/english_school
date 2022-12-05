<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function(){
            Teacher::factory()
            ->has(
                Course::factory(random_int(1, 2))
                    ->has(
                        Exam::factory(random_int(2, 4))
                            ->has(
                                Question::factory(random_int(5, 10))
                                    ->has(
                                        Answer::factory(random_int(3, 5)),
                                        'answers'
                                    ),
                                'questions'
                            ),
                        'exams'
                    ),
                'courses'
            )
            ->create();
        });
        // \App\Models\User::factory(10)->create();
    }
}
