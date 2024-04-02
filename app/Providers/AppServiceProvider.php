<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Creature;
use App\Models\Vote;
use App\Policies\OwnershipPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     */
    public function register(): void {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {
        Gate::policy(Comment::class, OwnershipPolicy::class);
        Gate::policy(Creature::class, OwnershipPolicy::class);
        Gate::policy(Vote::class, OwnershipPolicy::class);
    }
}
