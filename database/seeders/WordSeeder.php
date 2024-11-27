<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'words';
        $this->filename = base_path() . '/database/csvs/words.csv';
    }
    public function run(): void
    {
        DB::disableQueryLog();
        DB::table($this->table)->truncate();
        parent::run();
    }
}
