<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('is-admin', function($user){
          return $user->hasRole('Admin');
        });

        Gate::define('product-manager', function($user){
          return $user->hasAnyRoles(['Product manager','Admin']);
        });
        
        Gate::define('category-manager', function($user){
          return $user->hasAnyRoles(['Category manager','Admin']);
        });

        Gate::define('subcategory-manager', function($user){
          return $user->hasAnyRoles(['Subcategory manager','Admin']);
        });

        Gate::define('subsubcategory-manager', function($user){
          return $user->hasAnyRoles(['Sub-subcategory manager','Admin']);
        });
    }
}
