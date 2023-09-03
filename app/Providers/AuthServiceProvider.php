<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\SubjectTeacher;
use App\Policies\SubjectTeacherPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        SubjectTeacher::class => SubjectTeacherPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
