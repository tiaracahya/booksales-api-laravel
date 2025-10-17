<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        $authors = [
            ['name' => 'Agatha Christie'],
            ['name' => 'Pramoedya Ananta Toer'],
            ['name' => 'George Orwell'],
            ['name' => 'J.K. Rowling'],
            ['name' => 'Andrea Hirata'],
        ];

        foreach ($authors as $a) {
            Author::create($a);
        }
    }
}


