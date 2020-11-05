<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HouseTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */

    public function run() ///Full version
    {
        DB::table('houses')->insert([
            'id'=>1,
            'name'=>'Crackend',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'logo_lvl'=>4,
            'total_pts'=>133,
            'total_pts_note'=>7,
            'total_pts_po'=>80,
            'total_pts_defi'=>39
        ]);

        DB::table('houses')->insert([
            'id'=>2,
            'name'=>'PhoeniXML',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'logo_lvl'=>5,
            'total_pts'=>235,
            'total_pts_note'=>80,
            'total_pts_po'=>106,
            'total_pts_defi'=>49
        ]);

        DB::table('houses')->insert([
            'id'=>3,
            'name'=>'Gitsune',
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'logo_lvl'=>3,
            'total_pts'=>256,
            'total_pts_note'=>56,
            'total_pts_po'=>154,
            'total_pts_defi'=>46
        ]);
        //
    }

/*
    public function run() ///Empty version
    {
        DB::table('houses')->insert([
            'id'=>1,
            'name'=>'Crackend',
        ]);

        DB::table('houses')->insert([
            'id'=>2,
            'name'=>'PhoeniXML',
        ]);

        DB::table('houses')->insert([
            'id'=>3,
            'name'=>'Gitsune',
        ]);
    }*/

}
