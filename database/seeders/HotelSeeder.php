<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $dataHotel = file_get_contents(base_path('/database/hotel.json'));
        $hotel = json_decode($dataHotel, true);

        Hotel::insert($hotel);
    }
}
