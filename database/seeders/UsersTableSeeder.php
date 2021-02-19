<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
require 'UsersImportExel.php';

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */

    public function run() ///exel version
    {
        $usersList = getArrayListUsers();
        //$i = 0;
        foreach ($usersList as $user) {

            /*
            'mail'      => $row[0],
            'firstname' => $row[1],
            'lastname'  => $row[2],
            'status'    => $row[3],
            'is_admin'  => $row[4],
            'promo_id'  => $row[5]
             */

            DB::table('users')->insert([
                'first_name'=>$user[1],
                'last_name'=>ucfirst(strtolower($user[2])),
                'mail'=>$user[0],
                //'password'=>'mdp',
                'promo_id'=>$user[5],
                'statut'=>$user[3],
                'is_admin' => $user[4]
            ]);
            //$i++;
            //print_r($user[]);
            //echo '</br>';
            //echo "Nom : " . $user[2] . " | Prénom : " . $user[1] . " | Mail : " . $user[0];
        }

        /*
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
        */
    }


    /*
    public function run() ///Full version
    {
        DB::table('users')->insert([
            'id'=>1,
            'first_name'=>'Houssam',
            'last_name'=>'Laghzil',
            'mail'=>'hlaghzil@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student'

        ]);

        DB::table('users')->insert([
            'id'=>2,
            'first_name'=>'Elhoussamo',
            'last_name'=>'Ellaghzilo',
            'mail'=>'hlaghzilo@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>81,
            'total_pts_note'=>0,
            'total_pts_defi'=>39,
            'total_pts_po'=>42,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>3,
            'first_name'=>'Hugo',
            'last_name'=>'Monnerie',
            'mail'=>'Hmonnerie@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",
            'house_id'=>2,
            'total_pts'=>79,
            'total_pts_note'=>0,
            'total_pts_defi'=>9,
            'total_pts_po'=>70,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>4,
            'first_name'=>'Higi',
            'last_name'=>'Ninmerie',
            'mail'=>'hminnerie@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",
            'house_id'=>3,
            'total_pts'=>31,
            'total_pts_note'=>0,
            'total_pts_defi'=>38,
            'total_pts_po'=>-7,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>5,
            'first_name'=>'Marion',
            'last_name'=>'Meurant',
            'mail'=>'mmeurent@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",
            'house_id'=>3,
            'total_pts'=>198,
            'total_pts_note'=>20,
            'total_pts_defi'=>8,
            'total_pts_po'=>170,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>6,
            'first_name'=>'Marrin',
            'last_name'=>'Meurint',
            'mail'=>'mmeurint@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",
            'house_id'=>3,
            'total_pts'=>27,
            'total_pts_note'=>36,
            'total_pts_defi'=>0,
            'total_pts_po'=>-9,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>7,
            'first_name'=>'Alyssia',
            'last_name'=>'Prévoté--Hauguel',
            'mail'=>'aPrévoté--Hauguel@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",
            'total_pts'=>94,
            'total_pts_note'=>0,
            'total_pts_defi'=>80,
            'total_pts_po'=>14,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>8,
            'first_name'=>'Alsia',
            'last_name'=>'Prévoté--Huguel',
            'mail'=>'aPrévoté--uguel@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",
            'total_pts'=>62,
            'total_pts_note'=>0,
            'total_pts_defi'=>40,
            'total_pts_po'=>22,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>9,
            'first_name'=>'Colombe',
            'last_name'=>'Oiseau_Blanc',
            'mail'=>'colombe@mail.com',
            'password'=>'mdp+++',
            'house_id'=>NULL,
            'total_pts'=>0,
            'total_pts_note'=>0,
            'total_pts_defi'=>0,
            'total_pts_po'=>0,
            'total_given_pts'=>340,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'PO',

        ]);

        DB::table('users')->insert([
            'id'=>10,
            'first_name'=>'User01',
            'last_name'=>'User01',
            'mail'=>'User01@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>11,
            'first_name'=>'User02',
            'last_name'=>'User02',
            'mail'=>'User02@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>12,
            'first_name'=>'User03',
            'last_name'=>'User03',
            'mail'=>'User03@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>13,
            'first_name'=>'User04',
            'last_name'=>'User04',
            'mail'=>'User04@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>14,
            'first_name'=>'Houssam05',
            'last_name'=>'Houssam05',
            'mail'=>'Houssam05@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>15,
            'first_name'=>'User06',
            'last_name'=>'User06',
            'mail'=>'User06@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>16,
            'first_name'=>'User07',
            'last_name'=>'User07',
            'mail'=>'User07@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>17,
            'first_name'=>'User08',
            'last_name'=>'User08',
            'mail'=>'User08@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>18,
            'first_name'=>'User09',
            'last_name'=>'User09',
            'mail'=>'User09@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>19,
            'first_name'=>'User10',
            'last_name'=>'User10',
            'mail'=>'User10@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>20,
            'first_name'=>'User11',
            'last_name'=>'User11',
            'mail'=>'User11@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>21,
            'first_name'=>'User12',
            'last_name'=>'User12',
            'mail'=>'User12@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>22,
            'first_name'=>'User13',
            'last_name'=>'User13',
            'mail'=>'User13@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>23,
            'first_name'=>'User14',
            'last_name'=>'User14',
            'mail'=>'User14@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>24,
            'first_name'=>'User15',
            'last_name'=>'User15',
            'mail'=>'User15@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>25,
            'first_name'=>'User16',
            'last_name'=>'User16',
            'mail'=>'User16@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>26,
            'first_name'=>'User17',
            'last_name'=>'User17',
            'mail'=>'User17@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>27,
            'first_name'=>'User18',
            'last_name'=>'User18',
            'mail'=>'User18@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>28,
            'first_name'=>'User19',
            'last_name'=>'User19',
            'mail'=>'User19@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>29,
            'first_name'=>'User20',
            'last_name'=>'User20',
            'mail'=>'User20@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>30,
            'first_name'=>'User21',
            'last_name'=>'User21',
            'mail'=>'User21@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>31,
            'first_name'=>'User22',
            'last_name'=>'User22',
            'mail'=>'User22@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>32,
            'first_name'=>'User23',
            'last_name'=>'User23',
            'mail'=>'User23@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>33,
            'first_name'=>'User24',
            'last_name'=>'User24',
            'mail'=>'User24@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>34,
            'first_name'=>'User25',
            'last_name'=>'User25',
            'mail'=>'User25@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>35,
            'first_name'=>'User26',
            'last_name'=>'User26',
            'mail'=>'User26@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>36,
            'first_name'=>'User27',
            'last_name'=>'User27',
            'mail'=>'User27@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>37,
            'first_name'=>'User28',
            'last_name'=>'User28',
            'mail'=>'User28@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>38,
            'first_name'=>'User29',
            'last_name'=>'User29',
            'mail'=>'User29@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>39,
            'first_name'=>'User30',
            'last_name'=>'User30',
            'mail'=>'User30@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>40,
            'first_name'=>'User31',
            'last_name'=>'User31',
            'mail'=>'User31@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>41,
            'first_name'=>'User32',
            'last_name'=>'User32',
            'mail'=>'User32@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>42,
            'first_name'=>'User33',
            'last_name'=>'User33',
            'mail'=>'User33@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>43,
            'first_name'=>'User34',
            'last_name'=>'User34',
            'mail'=>'user34@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>44,
            'first_name'=>'User35',
            'last_name'=>'User35',
            'mail'=>'User35@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>45,
            'first_name'=>'User36',
            'last_name'=>'User36',
            'mail'=>'User36@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>46,
            'first_name'=>'User37',
            'last_name'=>'User37',
            'mail'=>'User37@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>47,
            'first_name'=>'User38',
            'last_name'=>'User38',
            'mail'=>'User38@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>48,
            'first_name'=>'User39',
            'last_name'=>'User39',
            'mail'=>'User39@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>49,
            'first_name'=>'User40',
            'last_name'=>'User40',
            'mail'=>'User40@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>50,
            'first_name'=>'User41',
            'last_name'=>'User41',
            'mail'=>'User41@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>51,
            'first_name'=>'User42',
            'last_name'=>'User42',
            'mail'=>'User42@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>52,
            'first_name'=>'User43',
            'last_name'=>'User43',
            'mail'=>'User43@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>53,
            'first_name'=>'User44',
            'last_name'=>'User44',
            'mail'=>'User44@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>54,
            'first_name'=>'User45',
            'last_name'=>'User45',
            'mail'=>'User45@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>55,
            'first_name'=>'User46',
            'last_name'=>'User46',
            'mail'=>'User46@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>56,
            'first_name'=>'User47',
            'last_name'=>'User47',
            'mail'=>'User47@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"2",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>57,
            'first_name'=>'User48',
            'last_name'=>'User48',
            'mail'=>'User48@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>58,
            'first_name'=>'User49',
            'last_name'=>'User49',
            'mail'=>'User49@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>59,
            'first_name'=>'User50',
            'last_name'=>'User50',
            'mail'=>'User50@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>60,
            'first_name'=>'User51',
            'last_name'=>'User51',
            'mail'=>'User51@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>61,
            'first_name'=>'User52',
            'last_name'=>'User52',
            'mail'=>'User52@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>62,
            'first_name'=>'User53',
            'last_name'=>'User53',
            'mail'=>'User53@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>63,
            'first_name'=>'User54',
            'last_name'=>'User54',
            'mail'=>'User54@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>64,
            'first_name'=>'User55',
            'last_name'=>'User55',
            'mail'=>'User55@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>65,
            'first_name'=>'User56',
            'last_name'=>'User56',
            'mail'=>'User56@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>66,
            'first_name'=>'User57',
            'last_name'=>'User57',
            'mail'=>'User57@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>67,
            'first_name'=>'User58',
            'last_name'=>'User58',
            'mail'=>'User58@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>68,
            'first_name'=>'User59',
            'last_name'=>'User59',
            'mail'=>'User59@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>69,
            'first_name'=>'User60',
            'last_name'=>'User60',
            'mail'=>'User60@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>70,
            'first_name'=>'User61',
            'last_name'=>'User61',
            'mail'=>'User61@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>71,
            'first_name'=>'User62',
            'last_name'=>'User62',
            'mail'=>'User62@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>72,
            'first_name'=>'User63',
            'last_name'=>'User63',
            'mail'=>'User63G@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"3",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

        ]);

        DB::table('users')->insert([
            'id'=>73,
            'first_name'=>'User64',
            'last_name'=>'User64',
            'mail'=>'User64G@gmail.com',
            'password'=>'mdp',
            'promo_id'=>"1",

            'total_pts'=>52,
            'total_pts_note'=>7,
            'total_pts_defi'=>0,
            'total_pts_po'=>38,
            'total_given_pts'=>0,
            'created_at'=>NULL,
            'updated_at'=>NULL,
            'statut'=>'student',

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

            'statut'=>'student',
        ]);

        DB::table('users')->insert([
            'id'=>2,
            'first_name'=>'Elhoussamo',
            'last_name'=>'Ellaghzilo',
            'mail'=>'hlaghzilo@gmail.com',
            'password'=>'mdp',
            'year'=>2020,

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
