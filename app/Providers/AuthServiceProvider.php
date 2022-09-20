<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Actualites;
use App\Models\Categories;
use App\Policies\UserPolicy;
use App\Policies\ActualitePolicy;
use App\Policies\CategoriePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Categories::class => CategoriePolicy::class,
        Actualites::class => ActualitePolicy::class,
        User::class => UserPolicy::class
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
