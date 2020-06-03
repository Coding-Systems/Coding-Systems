<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesPointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() ///Full version
    {
        DB::table('type_points')->insert([
            'name'=>'Smash',
            'type'=>'defi',
            'default_pts'=>7,
            'created_at'=>'2020-05-24 22:00:00',
        ]);

        DB::table('type_points')->insert([
            'name'=>'bottle_flip',
            'type'=>'defi',
            'default_pts'=>5,
            'created_at'=>'2020-05-25 22:00:00',
        ]);

        DB::table('type_points')->insert([
            'name'=>'Colombe',
            'type'=>'PO',
            'created_at'=>'2020-05-24 22:00:00',
        ]);

        DB::table('type_points')->insert([
            'name'=>'note_Java',
            'type'=>'note',
            'created_at'=>'2020-05-24 22:00:00',
        ]);
    }

}
