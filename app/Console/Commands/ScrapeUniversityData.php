<?php

namespace App\Console\Commands;

use App\Models\Major;
use GuzzleHttp\Client;
use App\Models\University;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class ScrapeUniversityData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:university-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape university data from PDDikti website';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Inisialisasi Guzzle Client
        $client = new Client();
        $baseUrl = 'https://pddikti.kemdikbud.go.id/';

        // URL dari website PDDikti
        $url = $baseUrl . '/data_pt'; 

        // Request halaman menggunakan Guzzle
        $response = $client->request('GET', $url);

        // Dapatkan konten HTML dari halaman
        $html = $response->getBody()->getContents();

        // Gunakan Symfony DomCrawler untuk parsing HTML
        $crawler = new Crawler($html);

        // Lakukan scraping data universitas
        $crawler->filter('.table-hover tr')->each(function ($row) use ($client, $baseUrl) {
            $name = $row->filter('td:nth-child(2)')->text(); // Kolom kedua adalah nama universitas
            $location = $row->filter('td:nth-child(3)')->text(); // Kolom ketiga adalah lokasi
            $universityDetailUrl = $row->filter('td:nth-child(2) a')->attr('href'); // Link ke halaman detail universitas

            // Simpan universitas ke database
            $university = University::create([
                'name' => $name,
                'location' => $location,
            ]);

            // Request halaman detail universitas untuk mengambil jurusan
            $detailResponse = $client->request('GET', $baseUrl . $universityDetailUrl);
            $detailHtml = $detailResponse->getBody()->getContents();
            $detailCrawler = new Crawler($detailHtml);

            // Scraping jurusan di halaman detail universitas
            $detailCrawler->filter('.table-hover tr')->each(function ($detailRow) use ($university) {
                $departmentName = $detailRow->filter('td:nth-child(2)')->text(); // Kolom kedua adalah nama jurusan

                // Simpan jurusan ke database
                Major::create([
                    'university_id' => $university->id,
                    'name' => $departmentName,
                ]);
            });
        });

        // dd($crawler);

        $this->info('Data universitas dan jurusan berhasil discrape dan disimpan di database.');
    }
}
