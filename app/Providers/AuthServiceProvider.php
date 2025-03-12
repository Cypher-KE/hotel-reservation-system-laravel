<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Room;
use App\Models\RoomType;
use App\Policies\RoomPolicy;
use App\Policies\RoomTypePolicy;
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
        Room::class => RoomPolicy::class,
        RoomType::class => RoomTypePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
