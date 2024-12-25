<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $donations = [
            [
                'name' => 'John Khatulistiwa',
                'transfer_proof' => 'uploads/donasi/banjir.jpg',
                'description' => 'Donasi untuk korban bencana banjir di KalimantanLorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum soluta aspernatur corporis mollitia molestiae magnam nam earum dolores error pariatur. Nam tenetur incidunt beatae nesciunt repellat aperiam ad dolor, iure corrupti asperiores numquam vero libero, praesentium voluptas, temporibus inventore nemo dolorum odio ut aliquam sit natus maiores deleniti. Ullam, id?',
                'transfer_date' => '2024-11-16',
            ],
            [
                'name' => 'Jack Doe',
                'transfer_proof' => 'uploads/donasi/gempa.jpg',
                'description' => 'Donasi untuk korban gempa di NTT',
                'transfer_date' => '2024-11-10',
            ],
        ];

        foreach ($donations as $donation) {
            \App\Models\Donation::create($donation);
        }
    }
}
