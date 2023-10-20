<?php

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use AshAllenDesign\LaravelExchangeRates\Facades\ExchangeRate;

/**
 *
 * This function will return the base_currency_unit_price
 * after converting the currency from USD to user desired
 * currency.
 *
 * The Function needs to be called at a variable
 * "$example = convertCurrency()"
 * and should be directly passed to the view using compact()
 *
 */
if (!function_exists('convertCurrency')) {
    function convertCurrency()
    {
        
        if (!Session::has('convertedCurrency')) {
            if (Auth::user()) {
                Session::put('convertedCurrency',ExchangeRate::exchangeRate('USD', Auth::user()->base_currency));
            } else {
                Session::put('convertedCurrency', ExchangeRate::exchangeRate('USD', Session::get('base_currency')));
            }
        }
        return Session::get('convertedCurrency');
    }
}

/**
 *
 * This function changes the currenct currency to USD
 * inorder to store it to DB again in the USD currenncy
 *
 */
if (!function_exists('convertCurrencyToUsd')) {
    function convertCurrencyToUsd($price)
    {
        if (Auth::user()) {
            return Currency::convert()
                ->from(Auth::user()->base_currency)
                ->to('USD')
                ->amount($price)
                ->get();
        } else {
            return Currency::convert()
                ->from(Session::get('base_currency'))
                ->to('USD')
                ->amount($price)
                ->get();
        }
    }
}

/**
 *
 * This function will return the product price
 * in the USD
 *
 */
if (!function_exists('showConvertedPriceToUsd')) {
    function showConvertedPriceToUsd($price)
    {
        return (convertCurrencyToUsd($price));
    }
}

/**
 *
 * This function will return the product price
 * in the base currency value as selected buy user
 *
 */
if (!function_exists('showConvertedPrice')) {
    function showConvertedPrice($product_price)
    {
        if (Auth::user()) {
            if (Auth::user()->base_currency == 'JPY') {
                return ($product_price * convertCurrency());
            } else {
                return ($product_price * convertCurrency());
            }
        } else {
            if (Session::get('base_currency') == 'JPY') {
                return ($product_price * convertCurrency());
            } else {
                return ($product_price * convertCurrency());
            }
        }
    }
}

/**
 *
 * This function will return the random user rating percentage
 *
 */
if (!function_exists('showUserRatingPercentage')) {
    function showUserRatingPercentage($user_id)
    {
        $user = User::where('id', $user_id)->first();
        if ($user->user_rating == 0) {
            return 0;
        } elseif ($user->user_rating == 1) {
            $percentage = rand(100, 200) / 10;
            return $percentage;
        } elseif ($user->user_rating == 2) {
            $percentage = rand(300, 400) / 10;
            return $percentage;
        } elseif ($user->user_rating == 3) {
            $percentage = rand(500, 600) / 10;
            return $percentage;
        } elseif ($user->user_rating == 4) {
            $percentage = rand(700, 800) / 10;
            return $percentage;
        } elseif ($user->user_rating == 5) {
            $percentage = rand(900, 1000) / 10;
            return $percentage;
        }
    }
}

if (!function_exists('makeURL')) {
    function makeURL($string)
    {
        $url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
        return (empty(trim($url, '-')) ? 'game-detail' : trim($url, '-'));
    }
}

/**
 *
 * This function will return the currency symbol as
 * if logged in will provide user base_currency
 * else will provide base_currency from session
 *
 */
if (!function_exists('showCurrencySymbol')) {
    function showCurrencySymbol()
    {
        if (Auth::user()) {
            if (Auth::user()->base_currency == 'USD')
                $currencySymbol = '$';
            elseif (Auth::user()->base_currency == 'EUR')
                $currencySymbol = '€';
            else
                $currencySymbol = '¥';
        } else {
            if (Session::get('base_currency') == 'USD')
                $currencySymbol = '$';
            elseif (Session::get('base_currency') == 'EUR')
                $currencySymbol = '€';
            else
                $currencySymbol = '¥';
        }
        return $currencySymbol;
    }
}

/**
 * This function is used to separate the amount
 * with ',' by thousands
 */
if (!function_exists('formatPrice')) {
    function formatPrice($number)
    {
        $number = (float)str_replace(',', '', $number);
        if (Auth::user()) {
            if (Auth::user()->base_currency == 'JPY') {
                return number_format($number);
            } else {
                return number_format($number, 2);
            }
        } else {
            if (Session::get('base_currency') == 'JPY') {
                return number_format($number);
            } else {
                return number_format($number, 2);
            }
        }
    }
}
