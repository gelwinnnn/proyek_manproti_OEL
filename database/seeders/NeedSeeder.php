<?php

namespace Database\Seeders;

use App\Models\Need;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $needs = [
            'needs' => 'Kebutuhan Panti',
        ];
        Need::create($needs);
    }
}
