<?php

namespace App\Policies;

use App\Models\Exam;
use App\Models\Question;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeachersQuestionPolicy
{
    use HandlesAuthorization;

    private Exam $exam;

    public function __construct()
    {
        $this->exam = request()->route()->exam;
    }

    public function viewAny(Teacher $teacher)
    {
        return $this->checkExamBelongToTeacher($teacher);
    }

    public function view(Teacher $teacher, Question $question)
    {
        return $this->checkExamBelongToTeacher($teacher) && $this->checkQuestionBelongToExam($question);
    }

    public function create(Teacher $teacher)
    {
        return $this->checkExamBelongToTeacher($teacher);
    }

    public function update(Teacher $teacher, Question $question)
    {
        return $this->checkExamBelongToTeacher($teacher) && $this->checkQuestionBelongToExam($question);
    }

    public function delete(Teacher $teacher, Question $question)
    {
        return $this->checkExamBelongToTeacher($teacher) && $this->checkQuestionBelongToExam($question);
    }

    private function checkExamBelongToTeacher(Teacher $teacher)
    {
        $requestExam = request()->has('exam_id') ? $teacher->exams->contains(request()->get('exam_id')) : true;

        return $this->exam->doesBelongsTo($teacher) && $requestExam;
    }

    private function checkQuestionBelongToExam(Question $question)
    {
        return $this->exam->questions->contains($question);
    }
}
