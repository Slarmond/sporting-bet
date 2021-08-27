<?php

namespace App\Providers;

use App\Item;
use App\User;
use App\Observers\ItemObserver;
use App\Observers\UserObserver;
use App\Services\EtherScanService;
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

        $sportService       = new OddsService();
        $etherScanService   = new EtherScanService();


        return View::share([
            // 'oddsData'                          => $sportService->getData(),
            'etherScanBalance'                  => $etherScanService->getEtherBalanceForASingleAddress(),
            'etherScanTransactions'             => $etherScanService->getTransactionsByAddress(),
            'etherScanTransactionReceipt'       => $etherScanService->getTransactionReceipt(),
            'etherScanContractExecutionStatus'  => $etherScanService->checkContractExecutionStatus(),
        ]);
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
