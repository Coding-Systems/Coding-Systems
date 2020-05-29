<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MvtPointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() ///Full version
    {
        DB::table('mvt_points')->insert([
            'label'=>7,
            'users_id'=>1,
            'professor_id'=>NULL,
            'type_point_id'=>4,
            'created_at'=>'2020-05-25 08:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>7,
            'users_id'=>1,
            'professor_id'=>NULL,
            'type_point_id'=>4,
            'created_at'=>'2020-05-25 19:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>38,
            'users_id'=>1,
            'professor_id'=>9,
            'type_point_id'=>3,
            'created_at'=>'2020-05-28 16:30:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>-8,
            'users_id'=>2,
            'professor_id'=>9,
            'type_point_id'=>3,
            'created_at'=>'2020-05-25 15:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>50,
            'users_id'=>2,
            'professor_id'=>9,
            'type_point_id'=>3,
            'created_at'=>'2020-05-27 17:30:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>39,
            'users_id'=>2,
            'professor_id'=>NULL,
            'type_point_id'=>1,
            'created_at'=>'2020-05-25 21:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>70,
            'users_id'=>3,
            'professor_id'=>9,
            'type_point_id'=>3,
            'created_at'=>'2020-05-26 08:40:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>9,
            'users_id'=>3,
            'professor_id'=>NULL,
            'type_point_id'=>2,
            'created_at'=>'2020-05-25 15:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>-7,
            'users_id'=>4,
            'professor_id'=>9,
            'type_point_id'=>3,
            'created_at'=>'2020-05-25 08:50:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>38,
            'users_id'=>4,
            'professor_id'=>NULL,
            'type_point_id'=>1,
            'created_at'=>'2020-05-28 16:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>20,
            'users_id'=>5,
            'professor_id'=>NULL,
            'type_point_id'=>4,
            'created_at'=>'2020-05-25 11:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>30,
            'users_id'=>5,
            'professor_id'=>9,
            'type_point_id'=>3,
            'created_at'=>'2020-05-27 09:40:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>8,
            'users_id'=>5,
            'professor_id'=>NULL,
            'type_point_id'=>1,
            'created_at'=>'2020-05-27 18:20:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>-9,
            'users_id'=>6,
            'professor_id'=>9,
            'type_point_id'=>3,
            'created_at'=>'2020-05-27 21:30:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>40,
            'users_id'=>5,
            'professor_id'=>9,
            'type_point_id'=>3,
            'created_at'=>'2020-05-25 12:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>36,
            'users_id'=>6,
            'professor_id'=>NULL,
            'type_point_id'=>4,
            'created_at'=>'2020-05-25 14:00:00',

        ]);

        DB::table('mvt_points')->insert([
            'label'=>80,
            'users_id'=>7,
            'professor_id'=>NULL,
            'type_point_id'=>4,
            'created_at'=>'2020-05-25 08:50:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>14,
            'users_id'=>7,
            'professor_id'=>9,
            'type_point_id'=>3,
            'created_at'=>'2020-05-25 08:20:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>-5,
            'users_id'=>8,
            'professor_id'=>9,
            'type_point_id'=>3,
            'created_at'=>'2020-05-29 13:00:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>27,
            'users_id'=>8,
            'professor_id'=>9,
            'type_point_id'=>3,
            'created_at'=>'2020-05-27 16:40:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>40,
            'users_id'=>8,
            'professor_id'=>NULL,
            'type_point_id'=>2,
            'created_at'=>'2020-05-25 12:50:00',
        ]);

        DB::table('mvt_points')->insert([
            'label'=>100,
            'users_id'=>5,
            'professor_id'=>9,
            'type_point_id'=>3,
            'created_at'=>'2020-05-27 14:57:00',
        ]);

    }


}
