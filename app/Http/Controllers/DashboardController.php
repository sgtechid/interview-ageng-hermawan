<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public $url_latest = 'https://api.freecurrencyapi.com/v1/latest?apikey=';

    public function index()
    {
        $data_currencies = [];
        $result_convert = [];

        $date = Carbon::now();
        $formatted_date = $date->translatedFormat('l, d F Y');

        $user_count = User::count();

        $url_currency = $this->url_latest . env('FREECURRENCYAPI_KEY') . '&base_currency=' . 'IDR';

        $response = Http::get($url_currency);

        if ($response->successful()) {
            $data_currencies = $response->json();
        }

        $data_user = User::all();

        $convert_currency = $this->url_latest . env('FREECURRENCYAPI_KEY') . '&currencies=IDR&base_currency=USD';

        $response = Http::get($convert_currency);
        if ($response->successful()) {
            $result_convert = $response->json();
        }

        return view('dashboard')->with([
            'data_currencies' => $data_currencies['data'],
            'date' => $formatted_date,
            'user_count' => $user_count,
            'data_user' => $data_user,
            'result_convert' => $result_convert,
        ]);
    }
}
