<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\PDDiktiScraperService;

class ScrapePTNDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pddikti:scrape';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape data PTN dan jurusan dari PDDikti';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $scraper = new PDDiktiScraperService();
        
        try {
            $result = $scraper->scrapePTNData();
            $this->info($result);
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
        }
    }
}
