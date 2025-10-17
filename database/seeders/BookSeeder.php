<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

class BookSeeder extends Seeder
{
    public function run()
    {
        $books = [
            [
                'title' => 'Murder on the Orient Express',
                'summary' => 'Detektif Hercule Poirot menyelidiki pembunuhan di kereta.',
                'author_name' => 'Agatha Christie',
                'genre_name' => 'Misteri',
                'published_year' => 1934
            ],
            [
                'title' => 'Bumi Manusia',
                'summary' => 'Novel karya Pramoedya tentang perjuangan dan cinta di masa kolonial.',
                'author_name' => 'Pramoedya Ananta Toer',
                'genre_name' => 'Sejarah',
                'published_year' => 1980
            ],
            [
                'title' => '1984',
                'summary' => 'Kisah distopia tentang dunia penuh pengawasan dan tirani.',
                'author_name' => 'George Orwell',
                'genre_name' => 'Distopia',
                'published_year' => 1949
            ],
            [
                'title' => 'Harry Potter and the Philosopher\'s Stone',
                'summary' => 'Kisah awal dunia sihir.',
                'author_name' => 'J.K. Rowling',
                'genre_name' => 'Fantasi',
                'published_year' => 1997
            ],
            [
                'title' => 'Laskar Pelangi',
                'summary' => 'Kisah inspiratif perjuangan anak-anak Belitung.',
                'author_name' => 'Andrea Hirata',
                'genre_name' => 'Inspiratif',
                'published_year' => 2005
            ],
        ];

        foreach ($books as $b) {
            $author = Author::where('name', $b['author_name'])->first();
            $genre = Genre::where('name', $b['genre_name'])->first();

            if ($author && $genre) {
                Book::create([
                    'title' => $b['title'],
                    'summary' => $b['summary'],
                    'author_id' => $author->id,
                    'genre_id' => $genre->id,
                    'published_year' => $b['published_year'],
                ]);
            }
        }
    }
}



