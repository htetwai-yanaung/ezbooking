<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Room;
use App\Models\User;
use App\Models\RoomType;
use App\Models\ExtService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\FreeServiceSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'first_name' => 'admin',
            'last_name' => '',
            'email' => 'admin@gmail.com',
            'phone' => '09123456789',
            'role' => 'admin',
            'nationality' => 'Myanmar',
            'password' => Hash::make('admin1234')
        ]);

        $roomTypes = ['Single Room','Double Room','Triple Room','Suite Room'];
        foreach($roomTypes as $roomType){
            RoomType::create([
                'name' => $roomType
            ]);
        }

        $ext_services = [
            [
                'name' => 'Dinner',
                'price' => 2000,
                'usd' => 5
            ],
            [
                'name' => 'Driver',
                'price' => 4000,
                'usd' => 10
            ]
        ];
        foreach($ext_services as $ext_service){
            ExtService::create($ext_service);
        }

        $this->call([
            FreeServiceSeeder::class,
        ]);
    }
}
