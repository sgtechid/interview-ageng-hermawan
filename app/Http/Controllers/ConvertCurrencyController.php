<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ConvertCurrencyController extends Controller
{
    public function index(Request $request)
    {
        $base_currency = $request->base_currency;
        $target_currency = $request->target_currency;

        $data_currencies = [];
        $result_convert = [];

        $url_currency = 'https://api.freecurrencyapi.com/v1/currencies?apikey=fca_live_tDFskwXIw01tIOqCo0QKXrs0kBgHhL6amnVB0zNi';

        if ($base_currency != null || $target_currency != null) {
            $currencies = implode('%2C', $target_currency);

            $convert_currency = 'https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_tDFskwXIw01tIOqCo0QKXrs0kBgHhL6amnVB0zNi&currencies=' . $currencies . '&base_currency=' . $base_currency;

            $response = Http::get($convert_currency);

            if ($response->successful()) {
                $result_convert = $response->json();
            }
        }

        $response = Http::get($url_currency);

        if ($response->successful()) {
            $data_currencies = $response->json();
        }

        return view('pages.convert-currency.index')->with([
            'data_currencies' => $data_currencies['data'],
            'result_convert' => $result_convert,
            'base_currency' => $base_currency,
            'target_currency' => $target_currency,
        ]);
    }
}
