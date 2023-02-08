<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Company;
use App\Models\DiaryEvaluation;
use App\Models\Grade;
use App\Models\JobEvaluation;
use App\Models\Person;
use App\Models\SchoolYear;
use App\Policies\CompanyPolicy;
use App\Policies\DiaryEvaluationPolicy;
use App\Policies\GradePolicy;
use App\Policies\JobEvaluationPolicy;
use App\Policies\PersonPolicy;
use App\Policies\SchoolYearPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Person::class => PersonPolicy::class,
        DiaryEvaluation::class => DiaryEvaluationPolicy::class,
        JobEvaluation::class => JobEvaluationPolicy::class,
        Company::class => CompanyPolicy::class,
        Grade::class => GradePolicy::class,
        SchoolYear::class => SchoolYearPolicy::class,
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
