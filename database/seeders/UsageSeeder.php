<?php

namespace Database\Seeders;

use Flynsarmy\CsvSeeder\CsvSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsageSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->table = 'usages';
        $this->filename = base_path() . '/database/csvs/usages.csv';
    }
    public function run(): void
    {
        DB::disableQueryLog();
        DB::table($this->table)->truncate();
        parent::run();
    }
}
