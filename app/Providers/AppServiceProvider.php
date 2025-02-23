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
        //->prefix() Dùng để thêm tiền tố (prefix) vào tất cả các route bên trong nhóm.
        
        // Đảm bảo rằng các route web được cấu hình
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
        // Load routes admin
        Route::middleware('web')
            ->prefix('admin')
            ->group(base_path('routes/admin.php'));
        // Đảm bảo rằng các route API được cấu hình
        Route::middleware('api')
            ->prefix('api')  // Các route API sẽ có tiền tố /api
            ->group(base_path('routes/api.php'));
    }
}
