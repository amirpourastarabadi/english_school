<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Question;
use App\Policies\TeachersCoursePolicy;
use App\Policies\TeachersExamPolicy;
use App\Policies\TeachersQuestionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Course::class => TeachersCoursePolicy::class,
        Exam::class => TeachersExamPolicy::class,
        Question::class => TeachersQuestionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
