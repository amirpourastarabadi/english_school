<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\AnswerQuestion;
use App\Models\Exam;
use App\Models\Question;
use Database\Factories\AdminFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);

        $exam = Exam::factory()->create();
        $exam->questions()->saveMany(Question::factory(20)->create());
        $exam->questions->each(function(Question $question){
            $falseAnswers = Answer::factory(3)->create();
            $trueAnswers = Answer::factory()->create();
            foreach($falseAnswers as $answer){
                AnswerQuestion::factory()->create([
                    'question_id' => $question->getKey(),
                    'answer_id' => $answer->getKey(),
                    'is_correct' => false
                ]);
            }
            AnswerQuestion::factory()->create([
                'question_id' => $question->getKey(),
                'answer_id' => $trueAnswers->getKey(),
                'is_correct' => true
            ]);
        });
    
        // $this->call(StudentSeeder::class);
        // $this->call(ExamQuestionSeeder::class);
        // $this->call(ExamSeeder::class);
        // $this->call(ExamStudentSeeder::class);
        // $this->call(QuestionSeeder::class);
        // $this->call(AnswerQuestionSeeder::class);
    }
}
