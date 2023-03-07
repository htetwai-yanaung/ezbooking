<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Room;
use App\Models\User;
use App\Models\RoomType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '09123456789',
            'role' => 'admin',
            'password' => Hash::make('admin1234')
        ]);

        $rooms = [
            [
                'name' => 'Lake View 1',
                'price' => 50,
                'cover_photo' => 'https://a0.muscache.com/im/pictures/miso/Hosting-46695796/original/a0965aa5-3907-466e-b727-0900e2a7e8c7.jpeg?im_w=720',
                'description' => 'Spacious, bright guestrooms with tasteful furnishing, wooden floor and panoramic windows from the ceiling to the floor.',
            ],
            [
                'name' => '2nd Row Lake View',
                'price' => 40,
                'cover_photo' => 'https://a0.muscache.com/im/pictures/miso/Hosting-21409981/original/a8fa243d-dac8-4238-93e5-f7aa33072ff8.jpeg?im_w=720',
                'description' => 'Spacious, bright guestrooms with tasteful furnishing, wooden floor and panoramic windows from the ceiling to the floor.',
            ],
            [
                'name' => 'Mountain View',
                'price' => 30,
                'cover_photo' => 'https://a0.muscache.com/im/pictures/82c577ee-3422-4fda-ae09-6716d76e8bef.jpg?im_w=720',
                'description' => 'Spacious, bright guestrooms with tasteful furnishing, wooden floor and panoramic windows from the ceiling to the floor.',
            ],
        ];

        $roomTypes = ['Single Room','Double Room','Triple Room','Queen Room','King Room','Standard Room','Deluxe Room','Suite Room'];
        foreach($roomTypes as $roomType){
            RoomType::create([
                'name' => $roomType
            ]);
        }
    }
}
