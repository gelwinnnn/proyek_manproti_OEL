<?php

namespace Database\Seeders;

use App\Models\Donation;
use App\Models\People;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            DonationSeeder::class,
            PeopleSeeder::class,
            NeedSeeder::class,
            EventSeeder::class,
            HomepageSeeder::class,
        ]);
    }
}
