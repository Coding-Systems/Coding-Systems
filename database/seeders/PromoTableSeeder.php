<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromoTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */

    public function run() ///Full version
    {
        DB::table('promo')->insert([
            'id'=>1,
            'name'=>'2019-Cergy',
        ]);

        DB::table('promo')->insert([
            'id'=>2,
            'name'=>'2019-Paris',
        ]);

        DB::table('promo')->insert([
            'id'=>3,
            'name'=>'2018-Cergy',
        ]);

        //
    }

}
