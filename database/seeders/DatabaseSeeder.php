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
        // Word::factory(1000)->create();

        $this->call([
            BookSeeder::class,
            WordSeeder::class,
            LineSeeder::class,
            UsageSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'houken@me.com',
            'password' => bcrypt('miles1128'),
        ]);
    }
}
