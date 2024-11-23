<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Line;
use App\Models\User;
use App\Models\Word;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Word::factory(1000)->create();
        Book::factory(5)->create();
        Line::factory(2000)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'houken@me.com',
            'password' => bcrypt('miles1128'),
        ]);
    }
}
