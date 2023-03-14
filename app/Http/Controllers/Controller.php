<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
// use AmrShawky\LaravelCurrency\Facade\Currency;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $currency['EUR'] = 1;
        $currency['JPY'] = 1;
        $currency['USD'] = 1;
        Session::forget('base_currency');
        Session::put('base_currency', 'JPY');
        View::share('currency', $currency);
    }
}
