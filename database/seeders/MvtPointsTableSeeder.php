<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MvtPointsTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run() ///Full version
    {
        DB::table('mvt_points')->insert([
            'nbr_points'=>7,
            'label'=>"Something",
            'users_id'=>1,
            'professor_id'=>NULL,
            'created_at'=>'2020-05-25 08:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>7,
            'label'=>"Something",
            'users_id'=>1,
            'professor_id'=>NULL,
            'created_at'=>'2020-05-25 19:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>38,
            'label'=>"Something",
            'users_id'=>1,
            'professor_id'=>9,
            'created_at'=>'2020-05-28 16:30:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>-8,
            'label'=>"Something",
            'users_id'=>2,
            'professor_id'=>9,
            'created_at'=>'2020-05-25 15:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>50,
            'label'=>"Something",
            'users_id'=>2,
            'professor_id'=>9,
            'created_at'=>'2020-05-27 17:30:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>39,
            'label'=>"Something",
            'users_id'=>2,
            'professor_id'=>NULL,
            'created_at'=>'2020-05-25 21:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>70,
            'label'=>"Something",
            'users_id'=>3,
            'professor_id'=>9,
            'created_at'=>'2020-05-26 08:40:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>9,
            'label'=>"Something",
            'users_id'=>3,
            'professor_id'=>NULL,
            'created_at'=>'2020-05-25 15:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>-7,
            'label'=>"Something",
            'users_id'=>4,
            'professor_id'=>9,
            'created_at'=>'2020-05-25 08:50:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>38,
            'label'=>"Something",
            'users_id'=>4,
            'professor_id'=>NULL,
            'created_at'=>'2020-05-28 16:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>20,
            'label'=>"Something",
            'users_id'=>5,
            'professor_id'=>NULL,
            'created_at'=>'2020-05-25 11:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>30,
            'label'=>"Something",
            'users_id'=>5,
            'professor_id'=>9,
            'created_at'=>'2020-05-27 09:40:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>8,
            'label'=>"Something",
            'users_id'=>5,
            'professor_id'=>NULL,
            'created_at'=>'2020-05-27 18:20:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>-9,
            'label'=>"Something",
            'users_id'=>6,
            'professor_id'=>9,
            'created_at'=>'2020-05-27 21:30:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>40,
            'label'=>"Something",
            'users_id'=>5,
            'professor_id'=>9,
            'created_at'=>'2020-05-25 12:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>36,
            'label'=>"Something",
            'users_id'=>6,
            'professor_id'=>NULL,
            'created_at'=>'2020-05-25 14:00:00',

        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>80,
            'label'=>"Something",
            'users_id'=>7,
            'professor_id'=>NULL,
            'created_at'=>'2020-05-25 08:50:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>14,
            'label'=>"Something",
            'users_id'=>7,
            'professor_id'=>9,
            'created_at'=>'2020-05-25 08:20:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>-5,
            'label'=>"Something",
            'users_id'=>8,
            'professor_id'=>9,
            'created_at'=>'2020-05-29 13:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>27,
            'label'=>"Something",
            'users_id'=>8,
            'professor_id'=>9,
            'created_at'=>'2020-05-27 16:40:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>40,
            'label'=>"Something",
            'users_id'=>8,
            'professor_id'=>NULL,
            'created_at'=>'2020-05-25 12:50:00',
        ]);

        DB::table('mvt_points')->insert([
            'nbr_points'=>100,
            'label'=>"Something",
            'users_id'=>5,
            'professor_id'=>9,
            'created_at'=>'2020-05-27 14:57:00',
        ]);
    }

}
