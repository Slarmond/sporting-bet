<?php

namespace App\Providers;

use App\Item;
use App\User;
use App\Observers\ItemObserver;
use App\Observers\UserObserver;
use App\Services\OddsService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Item::observe(ItemObserver::class);
        User::observe(UserObserver::class);
        $sportService = new OddsService();
        $data = $sportService->getData();

        return View::share('oddsData', $data);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
