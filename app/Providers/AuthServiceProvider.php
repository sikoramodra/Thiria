<?php

namespace App\Providers;

use App\Models\Publication;
use App\Policies\PublicationPolicy;
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
        Publication::class => PublicationPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        Gate::define('admin-access', function () {
            
            $password = request()->query('secret');

            if($password==="123456"){
                return true;
            }
            else{
                return false;
            }
        });
    }
}
