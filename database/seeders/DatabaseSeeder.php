<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Password@1'),
            'is_admin' => 1
        ]);

         User::create([
             'name' => 'user',
             'email' => 'user@gmail.com',
             'password' => Hash::make('Password@1')
         ]);

        RoomType::create(['name' => 'Standard']);
        RoomType::create(['name' => 'Deluxe']);
        RoomType::create(['name' => 'Superior']);

        $roomtypes = RoomType::all();
        foreach ($roomtypes as $index => $roomtype) {
            Room::create([
                'id' => $index + 1,
                'total_room' => mt_rand(2, 5),
                'no_beds' => mt_rand(1, 4),
                'price' => mt_rand(100, 200),
                'image' => 'img/room-' . mt_rand(1, 3) . '.jpg',
                'desc' => 'Free Coffee',
                'room_type_id' => $roomtype->id
            ]);
        }
    }
}
