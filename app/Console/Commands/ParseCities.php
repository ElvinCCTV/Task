<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ParseCities extends Command
{
    protected $signature = 'parse:cities';
    protected $description = 'Parse and store cities from HH.ru API';

    public function handle()
    {
                $response = Http::get('https://api.hh.ru/areas');
        $areas = $response->json();

        foreach ($areas as $country) {
            if ($country['name'] === 'Россия') {
                foreach ($country['areas'] as $city) {
                if (empty($city['areas'])){
                    $this->createOrUpdateCity($city, null);
                }else{
                    $this->parseAreas($city['areas'], $city['name']);
                }
                }
            }
        }

        $this->info('Cities parsed and stored successfully.');
    }

    private function parseAreas($areas, $region)
    {
        foreach ($areas as $area) {
            $this->createOrUpdateCity($area, $region );
        }
    }

    private function createOrUpdateCity($area, $region)
    {
        $slug = $this->generateUniqueSlug($area['name']);

        City::updateOrCreate(
            ['hh_id' => $area['id']],
            [
                'name' => $area['name'],
                'slug' => $slug,
                'hh_id' => $area['id'],
                'region' => $region,
            ]
        );
    }

    private function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $count = 2;

        while (City::where('slug', $slug)->exists()) {
            $slug = Str::slug($name) . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
