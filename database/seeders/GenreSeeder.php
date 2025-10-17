<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $genres = [
            ['name' => 'Misteri', 'description' => 'Cerita penuh teka-teki dan penyelidikan.'],
            ['name' => 'Sejarah', 'description' => 'Berdasarkan kisah nyata masa lampau.'],
            ['name' => 'Distopia', 'description' => 'Masa depan kelam dan penuh kontrol.'],
            ['name' => 'Fantasi', 'description' => 'Dunia penuh keajaiban dan sihir.'],
            ['name' => 'Inspiratif', 'description' => 'Kisah yang memotivasi dan menginspirasi.'],
        ];

        foreach ($genres as $g) {
            Genre::create($g);
        }
    }
}

