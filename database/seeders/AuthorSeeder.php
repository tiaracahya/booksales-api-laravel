<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use Carbon\Carbon;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $authors = [
            ['name' => 'Agatha Christie', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pramoedya Ananta Toer', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'George Orwell', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'J.K. Rowling', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Andrea Hirata', 'created_at' => $now, 'updated_at' => $now],
        ];

        Author::insert($authors);
    }
}


