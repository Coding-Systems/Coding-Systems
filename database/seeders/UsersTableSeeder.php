<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
require 'UsersImportExel.php';

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
/*
    public function run() ///exel version
    {
        $usersList = getArrayListUsers();
        $i = 0;
        foreach ($usersList as $user) {

            DB::table('users')->insert([
                'first_name'=>$user[2],
                'last_name'=>ucfirst(strtolower($user[1])),
                'mail'=>$user[0],
                'password'=>'mdp',
                'year'=>2020,
                'statut'=>'student',
                'google_id'=>$i,
            ]);
            $i++;
            //print_r($user[]);
            //echo '</br>';
            //echo "Nom : " . $user[2] . " | Prénom : " . $user[1] . " | Mail : " . $user[0];
        }

        DB::table('users')->insert([
            'first_name'=>'Colombe',
            'last_name'=>'Oiseau_Blanc',
            'mail'=>'colombe@mail.com',
            'password'=>'mdp+++',
            'year'=>2020,
            'house_id'=>NULL,
            'statut'=>'PO',
            'google_id' => 'as223',
        ]);
    }
*/

    public function run() ///Full version
    {
        DB::table('users')->insert([
            'id'=>1,
            'first_name'=>'Houssam',
            'last_name'=>'Laghzil',
            'mail'=>'hlaghzil@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>1,
            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',
            'logo_lvl'=>3
        ]);

        DB::table('users')->insert([
            'id'=>2,
            'first_name'=>'Elhoussamo',
            'last_name'=>'Ellaghzilo',
            'mail'=>'hlaghzilo@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>1,
            'total_pts'=>81,
            'total_pts_note'=>0,
            'total_pts_defi'=>39,
            'total_pts_po'=>42,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',
            'logo_lvl'=>1
        ]);

        DB::table('users')->insert([
            'id'=>3,
            'first_name'=>'Hugo',
            'last_name'=>'Monnerie',
            'mail'=>'Hmonnerie@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>2,
            'total_pts'=>79,
            'total_pts_note'=>0,
            'total_pts_defi'=>9,
            'total_pts_po'=>70,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',
            'logo_lvl'=>4
        ]);

        DB::table('users')->insert([
            'id'=>4,
            'first_name'=>'Higi',
            'last_name'=>'Ninmerie',
            'mail'=>'hminnerie@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>3,
            'total_pts'=>31,
            'total_pts_note'=>0,
            'total_pts_defi'=>38,
            'total_pts_po'=>-7,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',
            'logo_lvl'=>2,
        ]);

        DB::table('users')->insert([
            'id'=>5,
            'first_name'=>'Marion',
            'last_name'=>'Meurant',
            'mail'=>'mmeurent@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>3,
            'total_pts'=>198,
            'total_pts_note'=>20,
            'total_pts_defi'=>8,
            'total_pts_po'=>170,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',
            'logo_lvl'=>5
        ]);

        DB::table('users')->insert([
            'id'=>6,
            'first_name'=>'Marrin',
            'last_name'=>'Meurint',
            'mail'=>'mmeurint@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>3,
            'total_pts'=>27,
            'total_pts_note'=>36,
            'total_pts_defi'=>0,
            'total_pts_po'=>-9,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',
            'logo_lvl'=>3
        ]);

        DB::table('users')->insert([
            'id'=>7,
            'first_name'=>'Alyssia',
            'last_name'=>'Prévoté--Hauguel',
            'mail'=>'aPrévoté--Hauguel@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>2,
            'total_pts'=>94,
            'total_pts_note'=>0,
            'total_pts_defi'=>80,
            'total_pts_po'=>14,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',
            'logo_lvl'=>5
        ]);

        DB::table('users')->insert([
            'id'=>8,
            'first_name'=>'Alsia',
            'last_name'=>'Prévoté--Huguel',
            'mail'=>'aPrévoté--uguel@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>2,
            'total_pts'=>62,
            'total_pts_note'=>0,
            'total_pts_defi'=>40,
            'total_pts_po'=>22,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',
            'logo_lvl'=>1
        ]);

        DB::table('users')->insert([
            'id'=>9,
            'first_name'=>'Colombe',
            'last_name'=>'Oiseau_Blanc',
            'mail'=>'colombe@mail.com',
            'password'=>'mdp+++',
            'year'=>2020,
            'house_id'=>NULL,
            'total_pts'=>0,
            'total_pts_note'=>0,
            'total_pts_defi'=>0,
            'total_pts_po'=>0,
            'total_given_pts'=>340,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'PO',
            'logo_lvl'=>1
        ]);
        //
    }

    /*
    public function run() ///Empty version
    {
DB::table('users')->insert([
            'id'=>1,
            'first_name'=>'Houssam',
            'last_name'=>'Laghzil',
            'mail'=>'hlaghzil@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>1,
            'statut'=>'student',
        ]);

        DB::table('users')->insert([
            'id'=>2,
            'first_name'=>'Elhoussamo',
            'last_name'=>'Ellaghzilo',
            'mail'=>'hlaghzilo@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>1,
            'statut'=>'student',
        ]);

        DB::table('users')->insert([
            'id'=>3,
            'first_name'=>'Hugo',
            'last_name'=>'Monnerie',
            'mail'=>'Hmonnerie@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>2,
            'statut'=>'student',
        ]);

        DB::table('users')->insert([
            'id'=>4,
            'first_name'=>'Higi',
            'last_name'=>'Ninmerie',
            'mail'=>'hminnerie@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>3,
            'statut'=>'student',
        ]);

        DB::table('users')->insert([
            'id'=>5,
            'first_name'=>'Marion',
            'last_name'=>'Meurant',
            'mail'=>'mmeurent@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>3,
            'statut'=>'student',
        ]);

        DB::table('users')->insert([
            'id'=>6,
            'first_name'=>'Marrin',
            'last_name'=>'Meurint',
            'mail'=>'mmeurint@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>3,
            'statut'=>'student',
        ]);

        DB::table('users')->insert([
            'id'=>7,
            'first_name'=>'Alyssia',
            'last_name'=>'Prévoté--Hauguel',
            'mail'=>'aPrévoté--Hauguel@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>2,
            'statut'=>'student',
        ]);

        DB::table('users')->insert([
            'id'=>8,
            'first_name'=>'Alsia',
            'last_name'=>'Prévoté--Huguel',
            'mail'=>'aPrévoté--uguel@gmail.com',
            'password'=>'mdp',
            'year'=>2020,
            'house_id'=>2,
            'statut'=>'student',
        ]);

        DB::table('users')->insert([
            'id'=>9,
            'first_name'=>'Colombe',
            'last_name'=>'Oiseau_Blanc',
            'mail'=>'colombe@mail.com',
            'password'=>'mdp+++',
            'year'=>2020,
            'house_id'=>NULL,
            'statut'=>'PO',
        ]);
    }
    */
}
