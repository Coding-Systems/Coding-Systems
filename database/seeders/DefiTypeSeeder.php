<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefiTypeSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */

    public function run() ///Full version
    {
        DB::table('defis_type')->insert([
            'id'=>1,
            'label'=>'Smash',
            'number_of_points'=>10,
        ]);

        DB::table('defis_type')->insert([
            'id'=>2,
            'label'=>'Chifumi',
            'number_of_points'=>5,

        ]);



        //
    }

}
