<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('houses')->insert([
            'name' => 'Crackend',
            'points_up' => 0,
            'points_down' => 0,
        ]);

        DB::table('houses')->insert([
            'name' => 'PhoeniXML',
            'points_up' => 0,
            'points_down' => 0,
        ]);

        DB::table('houses')->insert([
            'name' => 'Gitsune',
            'points_up' => 0,
            'points_down' => 0,
        ]);
        //
    }
}
