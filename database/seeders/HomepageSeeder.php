<?php

namespace Database\Seeders;

use App\Models\Homepage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomepageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Homepage::create([
            'title' => 'Ora Et Labora',
            'history' => 'Perhimpunan "ORA ET LABORA" semula berasal dari
                    Yayasan Bunda Elisabeth yang beralamat di Medayu Utara,
                    Rungkut. Pada tanggal 4 September 2005, Panti Asuhan
                    Bunda Elisabeth ini dibubarkan oleh pengurus. Sebagian
                    dari pengurus panti ini dipercayakan untuk menyalurkan
                    anak-anak asuh ke panti-panti yang ada di Surabaya.
                    Sedangkan Sebagian dari mereka yang masih memilki
                    orang tua dikembalikan ke orang tua masing-masing. Para
                    pengurus yang dipercayakan untuk menyalurkan anak-
                    anak ini merasa terbeban dan berusaha untuk melanjutkan
                    pengasuhan dan pendidikan mereka. Akhirnya, para
                    pengasuh memutuskan untuk mendirikan Perhimpunan
                    "ORA ET LABORA".
                    <br>
                    <br>
                    Kami menyadari bahwa tidak mudah untuk membina
                    sebuah panti asuhan yang baru dengan segala
                    keterbatasan. Namun, berkat anugerah dan penyertaan
                    Allah serta doa dan kepedulian para donatur, relasi, dan
                    sukarelawan yang dengan tulus hati membantu anak-anak
                    asuh ini, Perhimpunan "ORA ET LABORA" ada hingga
                    sampai saat ini',
            'vision' => 'Menjadi Garam dan Terang Dunia',
            'mission' => 'Memberi kesempatan kepada setiap anak untuk memperoleh pendidikan,
                    pembinaan intelektual, dan moral
                    berdasarkan
                    nilai-nilai Kristiani sehingga dapat berbuat dan berkarya baik bagi diri sendiri maupun orang lain
                    dimanapun mereka berada (1 Kor 12 : 12-31)',


        ]);
    }
}
