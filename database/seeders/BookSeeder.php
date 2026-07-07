<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Laravel Basics',
            'stock' => 5,
        ]);

        Book::create([
            'title' => 'PHP Advanced',
            'stock' => 2,
        ]);
    }
}