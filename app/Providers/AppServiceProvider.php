<?php

namespace App\Providers;

use App\Http\Resources\AreaCollection;
use App\Http\Resources\AreaResource;
use App\Models\Order;
use App\Models\ProviderMoneyTransfer;
use App\Models\Rate;
use App\Observers\OrderObserver;
use App\Observers\ProviderMoneyTransferObserver;
use App\Observers\RateObserver;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
        Route::macro('resourceAdmin', function ($uri, $controller) {
            Route::get("{$uri}/{id}/change-status", "{$controller}@changeStatus")->name("{$uri}.status");
            Route::resource($uri, $controller);
        });

        $this->app->singleton('default_lang', function ($app) {
            return get_default_language_id(true);
        });
        date_default_timezone_set('Asia/Riyadh');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

    }
}
