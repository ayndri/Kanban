<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (isset($_SERVER['VERCEL'])) {
            $tmpStorage = '/tmp/storage';
            foreach ([
                "$tmpStorage/framework/cache/data",
                "$tmpStorage/framework/sessions",
                "$tmpStorage/framework/views",
                "$tmpStorage/logs",
                "$tmpStorage/app",
            ] as $dir) {
                if (!is_dir($dir)) {
                    @mkdir($dir, 0755, true);
                }
            }
            $this->app->useStoragePath($tmpStorage);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(UrlGenerator $url): void
    {
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $unreadNotifications = $user->unreadNotifications()->limit(5)->get();
                $unreadNotificationsCount = $user->unreadNotifications()->count();

                $view->with('unreadNotifications', $unreadNotifications)
                    ->with('unreadNotificationsCount', $unreadNotificationsCount);
            } else {
                // Beri nilai default jika user belum login
                $view->with('unreadNotifications', collect())
                    ->with('unreadNotificationsCount', 0);
            }
        });

        if (env('APP_ENV') === 'production') {
            $url->forceScheme('https');
        }
    }
}
