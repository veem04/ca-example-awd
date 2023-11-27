<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::factory()->times(3)->create();

        $numOfAuthors = 3
        foreach(Book::all() as $book){
            $authors = Author::inRandomOrder()->take(rand(1,$numOfAuthors))->pluck('id');
            $book->authors()->attach($authors);
        }
    }
}
