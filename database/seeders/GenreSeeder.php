<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;
use Carbon\Carbon;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $genres = [
            [
                'name' => 'Misteri',
                'description' => 'Cerita penuh teka-teki dan penyelidikan.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Sejarah',
                'description' => 'Berdasarkan kisah nyata masa lampau.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Distopia',
                'description' => 'Masa depan kelam dan penuh kontrol.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Fantasi',
                'description' => 'Dunia penuh keajaiban dan sihir.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Inspiratif',
                'description' => 'Kisah yang memotivasi dan menginspirasi.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Genre::insert($genres);
    }
}


