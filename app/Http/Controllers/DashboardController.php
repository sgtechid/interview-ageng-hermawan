<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $data_currencies = [];
        $result_convert = [];

        $date = Carbon::now();
        $formatted_date = $date->translatedFormat('l, d F Y');

        $user_count = User::count();

        $url_currency = 'https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_tDFskwXIw01tIOqCo0QKXrs0kBgHhL6amnVB0zNi&base_currency=' . 'IDR';

        $response = Http::get($url_currency);

        if ($response->successful()) {
            $data_currencies = $response->json();
        }

        $data_user = User::all();

        $convert_currency = 'https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_tDFskwXIw01tIOqCo0QKXrs0kBgHhL6amnVB0zNi&currencies=' . 'IDR' . '&base_currency=' . 'USD';
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
