<?php

namespace App\Models\Behaviors;

use App\Models\Course;
use App\Models\Exam;
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

    public function finishExam(Exam $exam/**, AnswerSheet $answerSheet */)
    {
        if ($this->hasOpenExam($exam)) {
            // $this->saveAnserSheet($exam, $answerSheet);

            $this->exams()
                ->where('exam_id', $exam->id)
                ->whereNull('finished_at')
                ->update(['finished_at' => now()]);
        }
    }

    public function hasOpenExam(Exam $exam)
    {
        return $this->exams()
            ->whereNull('finished_at')
            ->where('exam_id', $exam->id)
            ->exists();
    }
}
