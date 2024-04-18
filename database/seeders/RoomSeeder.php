<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dataRooms = file_get_contents(base_path('/database/room.json'));
        $room = json_decode($dataRooms, true);

        Room::insert($room);
    }
}
