<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\ScrapePTNDataCommand;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('PDDikti', function () {
    $this->comment(ScrapePTNDataCommand::class);
});
