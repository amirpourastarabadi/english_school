<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\Exam;
use App\Policies\TeachearsCoursePolicy;
use App\Policies\TeachearsExamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Course::class => TeachearsCoursePolicy::class,
        Exam::class => TeachearsExamPolicy::class,
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
