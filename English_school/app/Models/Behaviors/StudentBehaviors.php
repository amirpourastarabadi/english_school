<?php

namespace App\Models\Behaviors;

use App\Models\Course;
use App\Models\Exam;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

trait StudentBehaviors
{
    public function deleteSanctumTokens(string $token_name)
    {
        $this->tokens()->where('name', $token_name)->delete();
    }

    public function enroll(Course $course)
    {
        if (!$this->enrolledInCourse($course)) {
            $this->courses()->attach($course);
        }
    }

    public function leave(Course $course)
    {
        if ($this->enrolledInCourse($course)) {
            $this->courses()->detach($course);
        }
    }

    public function enrolledInCourse(Course $course)
    {
        return $this->courses->contains($course);
    }

    public function startExam(Exam $exam)
    {
        if (!$this->hasOpenExam($exam)) {
            $this->exams()->attach([$exam->getKey() => ['started_at' => now(), 'finished_at' => null]]);
            return;
        }
    }

    public function finishExam(Exam $exam, array $answers): string
    {
        if ($this->hasOpenExam($exam)) {

            $this->saveAnswerSheet($exam, $answers);

            $this->exams()
                ->where('exam_id', $exam->id)
                ->whereNull('finished_at')
                ->update(['finished_at' => now()]);

            return "Thanks, You can see the result in your profile.";
        }

        return "You don't have open exam on '$exam->title' of course '{$exam->course->title}'!";
    }

    public function hasOpenExam(Exam $exam)
    {
        return $this->exams()
            ->whereNull('finished_at')
            ->where('exam_id', $exam->id)
            ->exists();
    }

    public function saveAnswerSheet(Exam $exam, array $answers)
    {
        $answerSheet = [];
        foreach ($answers as $question => $answer) {
            $answerSheet[] = [
                'answered_id'  => $answer,
                'exam_id'      => $exam->getKey(),
                'question_id'  => $question,
                'student_id'   => $this->getKey(),
                'submitted_at' => now()->toDateTimeString(),
            ];
        }

        DB::table('answer_sheets')->insert($answerSheet);
    }
}
