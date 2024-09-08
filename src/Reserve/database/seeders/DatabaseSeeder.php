<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Reservation;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Event::factory(100)->create();
        $this->call([
            UserSeeder::class,
            // ReservationSeeder::class
        ]);
    }
}
