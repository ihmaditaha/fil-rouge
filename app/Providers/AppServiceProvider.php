<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;
use App\Models\Announce;
use App\Models\User;
use App\Policies\AnnouncePolicy;
use App\Policies\UserPolicy;

class AppServiceProvider extends ServiceProvider
{
    protected array $policies = [
        Announce::class => AnnouncePolicy::class,
        User::class => UserPolicy::class,
    ];

    public function register(): void
    {
        //
                Schema::defaultStringLength(191);

    }

    public function boot(): void
    {
        $this->registerPolicies();
    }

    protected function registerPolicies(): void
    {
        foreach ($this->policies as $model => $policy) {
            Gate::policy($model, $policy);
        }
    }
}
