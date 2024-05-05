<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CurrencyConverter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convert:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert Cron Job Currency';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $convert_currency = 'https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_tDFskwXIw01tIOqCo0QKXrs0kBgHhL6amnVB0zNi&currencies=' . 'IDR' . '&base_currency=' . 'USD';

        $response = Http::get($convert_currency);

        if ($response->successful()) {
            $result_convert = $response->json();
            Log::info('Cron job Berhasil di jalankan');
        }
    }
}
