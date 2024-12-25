<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'name' => "Ibadah Natal",
                'description' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed magni obcaecati voluptate doloribus laborum sapiente harum numquam, adipisci nihil delectus alias, dolor cumque reiciendis! Adipisci nesciunt ratione quo blanditiis ipsam? Excepturi, quaerat dolorem. Unde quod culpa quasi esse eos id ullam ex iste distinctio omnis ducimus placeat, animi velit cupiditate ab cumque sequi quaerat? Magnam id, minus dicta aliquam pariatur deserunt? Quia, iste saepe voluptatem animi necessitatibus neque possimus vero dicta illo accusantium nesciunt corporis molestias alias deleniti sint! Unde aliquid cum sapiente eum debitis soluta fugit similique, in repellat vitae doloribus saepe eligendi illo necessitatibus. Numquam laboriosam mollitia veniam?",
                'image' => 'uploads/events/natal.jpg',
                'date' => '2024-12-25',
            ],
            [
                'name' => "Ibadah Paskah",
                'description' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed magni obcaecati voluptate doloribus laborum sapiente harum numquam, adipisci nihil delectus alias, dolor cumque reiciendis! Adipisci nesciunt ratione quo blanditiis ipsam? Excepturi, quaerat dolorem. Unde quod culpa quasi esse eos id ullam ex iste distinctio omnis ducimus placeat, animi velit cupiditate ab cumque sequi quaerat? Magnam id, minus dicta aliquam pariatur deserunt? Quia, iste saepe voluptatem animi necessitatibus neque possimus vero dicta illo accusantium nesciunt corporis molestias alias deleniti sint! Unde aliquid cum sapiente eum debitis soluta fugit similique, in repellat vitae doloribus saepe eligendi illo necessitatibus. Numquam laboriosam mollitia veniam?",
                'image' => 'uploads/events/paskah.jpg',
                'date' => '2024-03-31',
            ],
            [
                'name' => "Kegiatan Senam Bersama",
                'description' => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed magni obcaecati voluptate doloribus laborum sapiente harum numquam, adipisci nihil delectus alias, dolor cumque reiciendis! Adipisci nesciunt ratione quo blanditiis ipsam? Excepturi, quaerat dolorem. Unde quod culpa quasi esse eos id ullam ex iste distinctio omnis ducimus placeat, animi velit cupiditate ab cumque sequi quaerat? Magnam id, minus dicta aliquam pariatur deserunt? Quia, iste saepe voluptatem animi necessitatibus neque possimus vero dicta illo accusantium nesciunt corporis molestias alias deleniti sint! Unde aliquid cum sapiente eum debitis soluta fugit similique, in repellat vitae doloribus saepe eligendi illo necessitatibus. Numquam laboriosam mollitia veniam?",
                'image' => 'uploads/events/senam.jpg',
                'date' => '2024-07-07',
            ],
        ];

        foreach ($events as $event) {
            \App\Models\Event::create($event);
        }
    }
}
