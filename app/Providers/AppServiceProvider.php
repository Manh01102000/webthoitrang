<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Đăng ký các dịch vụ của bạn
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Đảm bảo rằng các route web được cấu hình
        Route::middleware('web')
            ->group(base_path('routes/web.php'));

        // Đảm bảo rằng các route API được cấu hình
        Route::middleware('api')
            ->prefix('api')  // Các route API sẽ có tiền tố /api
            ->group(base_path('routes/api.php'));
    }
}
