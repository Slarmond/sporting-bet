<?php
/*

=========================================================
* Argon Dashboard PRO - v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro-laravel
* Copyright 2018 Creative Tim (https://www.creative-tim.com) & UPDIVISION (https://www.updivision.com)

* Coded by www.creative-tim.com & www.updivision.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/

namespace App\Http\Controllers;

use App\Services\EtherScanService;
use App\Services\OddsService;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $user_wallet_address    = $user->wallet_address;
        $sportService           = new OddsService();
        $etherScanService       = new EtherScanService();

        return view('pages.dashboard', [
            // 'oddsData'                          => $sportService->getData(),
            'etherScanBalance'                  => $etherScanService->getEtherBalanceForASingleAddress($user_wallet_address),
            'etherScanTransactions'             => $etherScanService->getTransactionsByAddress($user_wallet_address),
            // 'etherScanTransactionReceipt'       => $etherScanService->getTransactionReceipt($user_wallet_address),
            // 'etherScanContractExecutionStatus'  => $etherScanService->checkContractExecutionStatus($user_wallet_address),
        ]);
    }
}
