<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;


class CheckLogoLvl
{

    public function checkSystemsLvl(){
        $step1 = 100;
        $step2 = 500;
        $step3 = 1000;
        $step4 = 5000;
        $newlvlLogo = 1;

        $listSystems = DB::select('SELECT id , logo_lvl, total_pts
        FROM systems
        ');

        foreach ($listSystems as $system){
            if ($system->total_pts >= $step4){
                $newlvlLogo = 5;
            }
            elseif ($system->total_pts >= $step3){
                $newlvlLogo = 4;
            }
            elseif ($system->total_pts >= $step2){
                $newlvlLogo = 3;
            }
            elseif ($system->total_pts >= $step1){
                $newlvlLogo = 2;
            }

            DB::table('systems')
                ->where("id", $system->id)
                ->update([
                    'logo_lvl' => $newlvlLogo,
                ]);
        }
    }

    public function checkUserLvl(){
        $step1 = 50;
        $step2 = 100;
        $step3 = 250;
        $step4 = 500;
        $newlvlLogo = 1;

        $listUsers = DB::select('SELECT id , logo_lvl, total_pts
        FROM users
        ');

        foreach ($listUsers as $user){
            if ($user->total_pts >= $step4){
                $newlvlLogo = 5;
            }
            elseif ($user->total_pts >= $step3){
                $newlvlLogo = 4;
            }
            elseif ($user->total_pts >= $step2){
                $newlvlLogo = 3;
            }
            elseif ($user->total_pts >= $step1){
                $newlvlLogo = 2;
            }

            DB::table('users')
                ->where("id", $user->id)
                ->update([
                    'logo_lvl' => $newlvlLogo,
                ]);
        }
    }

    public function startCheck() {
        $this->checkSystemsLvl();
        $this->checkUserLvl();
        echo '<p>Vérifications effectuées</p>';
    }


}
