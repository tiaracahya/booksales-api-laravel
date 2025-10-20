<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Carbon\Carbon;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $books = [
            [
                'title' => 'Murder on the Orient Express',
                'summary' => 'Detektif Hercule Poirot menyelidiki pembunuhan di kereta.',
                'author_id' => 1,
                'genre_id' => 1,
                'published_year' => 1934,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Bumi Manusia',
                'summary' => 'Novel karya Pramoedya tentang perjuangan dan cinta di masa kolonial.',
                'author_id' => 2,
                'genre_id' => 2,
                'published_year' => 1980,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => '1984',
                'summary' => 'Kisah distopia tentang dunia penuh pengawasan dan tirani.',
                'author_id' => 3,
                'genre_id' => 3,
                'published_year' => 1949,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Harry Potter and the Philosopher\'s Stone',
                'summary' => 'Kisah awal dunia sihir.',
                'author_id' => 4,
                'genre_id' => 4,
                'published_year' => 1997,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Laskar Pelangi',
                'summary' => 'Kisah inspiratif perjuangan anak-anak Belitung.',
                'author_id' => 5,
                'genre_id' => 5,
                'published_year' => 2005,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        Book::insert($books);
    }
}
