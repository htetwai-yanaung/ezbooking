<?php

namespace Database\Seeders;

use App\Models\FreeService;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FreeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $freeServices = [
            'Breakfast',
            'Free Wifi',
            'Coffee & Tea',
            'Coffee Maker',
            'Refrigerator',
            'Safe',
            'Shuttle Service',
        ];
        foreach($freeServices as $freeService){
            FreeService::create([
                'name' => $freeService
            ]);
        }
    }
}
