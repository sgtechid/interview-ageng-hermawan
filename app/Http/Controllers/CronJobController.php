<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;

class CronJobController extends Controller
{
    public $url_latest = 'https://api.freecurrencyapi.com/v1/latest?apikey=';

    public function index()
    {
        $result_convert = [];

        $convert_currency = $this->url_latest . env('FREECURRENCYAPI_KEY') . '&currencies=' . 'IDR' . '&base_currency=' . 'USD';

        $response = Http::get($convert_currency);

        if ($response->successful()) {
            $result_convert = $response->json();
        }

        return view('pages.cron-job.index')->with([
            'result_convert' => $result_convert,
        ]);
    }

    public function create(Request $request)
    {
        Artisan::call('schedule:run');

        $output = Artisan::output();
        $isActive = strpos($output, 'No scheduled commands are ready to run.');

        if (!$isActive) {
            return redirect()->back()->with('success', 'Scheduler telah diaktifkan');
        }

        return redirect()->back()->with('error', 'Scheduler sudah aktif');
    }

    public function destroy(Request $request)
    {
        Artisan::call('schedule:interrupt');
        return redirect()->back()->with('success', 'Cron Job telah dinonaktifkan');
    }
}
