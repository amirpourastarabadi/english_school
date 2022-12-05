<?php

namespace App\Policies;

use App\Models\Answer;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherAnswerPolicy
{
    use HandlesAuthorization;


    public function viewAny(Teacher $teacher)
    {
        return $teacher->exams->contains(request()->route()->exam) &&
            request()->route()->exam->questions->contains(request()->route()->question);
    }

    public function view(Teacher $teacher, Answer $answer)
    {
        return $teacher->exams->contains(request()->route()->exam) &&
            request()->route()->exam->questions->contains(request()->route()->question) &&
            request()->route()->question->answers->contains($answer);
    }

    public function create(Teacher $teacher)
    {
        return $teacher->exams->contains(request()->route()->exam) &&
            request()->route()->exam->questions->contains(request()->route()->question);
    }

    public function update(Teacher $teacher, Answer $answer)
    {
        return $teacher->exams->contains(request()->route()->exam) &&
            request()->route()->exam->questions->contains(request()->route()->question) &&
            request()->route()->question->answers->contains($answer);
    }

    public function delete(Teacher $teacher, Answer $answer)
    {
        return $teacher->exams->contains(request()->route()->exam) &&
            request()->route()->exam->questions->contains(request()->route()->question) &&
            request()->route()->question->answers->contains($answer);
    }
}
