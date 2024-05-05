<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ConvertCurrencyController extends Controller
{
    public $url_latest = 'https://api.freecurrencyapi.com/v1/latest?apikey=';
    public $url_convert = 'https://api.freecurrencyapi.com/v1/currencies?apikey=';

    public function index(Request $request)
    {
        $base_currency = $request->base_currency;
        $target_currency = $request->target_currency;

        $data_currencies = [];
        $result_convert = [];

        $url_currency = $this->url_convert . env('FREECURRENCYAPI_KEY');

        if ($base_currency != null || $target_currency != null) {
            $currencies = implode('%2C', $target_currency);

            $convert_currency = $this->url_latest . env('FREECURRENCYAPI_KEY') . '&currencies=' . $currencies . '&base_currency=' . $base_currency;
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
