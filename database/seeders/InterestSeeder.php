<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interest_rate')->insert([
            ['days' => 10,'interest_rate' => 3.5],
            ['days' => 30,'interest_rate' => 7],
            ['days' => 60,'interest_rate' => 12],
            ['days' => 180,'interest_rate' => 25],
            ['days' => 365,'interest_rate' => 50],
            ['days' => 730,'interest_rate' => 55],
            ['days' => 1095,'interest_rate' => 60],
        ]);
    }
}
