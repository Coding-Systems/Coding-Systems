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
        DB::table('house')->insert([
            'name' => 'Crackend',
            'pointsUp' => 0,
            'pointsDown' => 0,
        ]);

        DB::table('house')->insert([
            'name' => 'PhoeniXML',
            'pointsUp' => 0,
            'pointsDown' => 0,
        ]);

        DB::table('house')->insert([
            'name' => 'Gitsune',
            'pointsUp' => 0,
            'pointsDown' => 0,
        ]);
        //
    }
}
