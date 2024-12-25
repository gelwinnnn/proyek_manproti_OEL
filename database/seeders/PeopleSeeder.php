<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $peoples = [
            [
                'count' => 41,
                'category' => 'TK',
            ],
            [
                'count' => 30,
                'category' => 'SD',
            ],
            [
                'count' => 21,
                'category' => 'SMP',
            ],
            [
                'count' => 11,
                'category' => 'SMA',
            ],
            [
                'count' => 5,
                'category' => 'Kuliah',
            ],
            [
                'count' => 30,
                'category' => 'PENGASUH',
            ],
        ];

        foreach ($peoples as $people) {
            \App\Models\People::create($people);
        }
    }
}
