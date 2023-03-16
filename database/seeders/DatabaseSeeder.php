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


        $rooms = [
            [
                'title' => 'Lake View',
                'room_number' => 1,
                'description' => 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
                'room_type_id' => 1,
                'price' => 20000,
                'usd' => 10,
                'discount' => 0,
                'beds' => 'Small bed',
                'bed_count' => 1,
                'cover_photo' => 'cv_default_01.jpg',
                'status' => 'Available',
                'images' => '["default_01.jpg","default_02.jpg","default_03.jpg","default_04.jpg"]',
                'services' => '["2","1","4","3","6","5"]',
            ],
            [
                'title' => 'Mountain View',
                'room_number' => 2,
                'description' => 'This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.',
                'room_type_id' => 2,
                'price' => 25000,
                'usd' => 12,
                'discount' => 0,
                'beds' => 'Small bed',
                'bed_count' => 2,
                'cover_photo' => 'cv_default_02.jpg',
                'status' => 'Available',
                'images' => '["default_01.jpg","default_02.jpg","default_03.jpg","default_04.jpg"]',
                'services' => '["1","2","3","6","5","4"]',
            ]
        ];
        foreach($rooms as $room){
            Room::create($room);
        }

        $this->call([
            FreeServiceSeeder::class,
        ]);
    }
}
