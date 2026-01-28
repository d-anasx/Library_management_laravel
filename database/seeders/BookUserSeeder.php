<?php

namespace Database\Seeders;
use App\Models\Book;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $books = Book::all();

        foreach ($users as $user) {
            $randomBooks = $books->random(rand(1, 5));
            
            foreach ($randomBooks as $book) {
                $user->books()->attach($book->id);
            }
        }
    }
}