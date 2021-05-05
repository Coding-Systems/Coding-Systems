<!DOCTYPE html>
<html lang="fr">
<?php
use Illuminate\Support\Facades\DB;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
?>

<head>
    <meta charset="UTF-8">
    <title>Coding system</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    <link href="resources/js/app.js">

    @include('cssSwitcher')

    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/all.css"/>
    <link rel="stylesheet" href="css/pages/home.css"/>

</head>

<body>


@include('header')

<h1>Coding Systems</h1>

<section id="rankings">
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>

    <section id="generalRanking">

        <h2>Classement général</h2>

        <section id=logoSystemsPodium>

            <?php

            $results = App\System::select('total_pts as pts', 'name as hname')->orderBy('pts', 'DESC')->get();

            $rank=0;

            foreach ($results as $system){
                $rank++;
                echo '<section>';

                if($rank==1){
                    echo '<img class="logoPodiumFirst logoP"';
                }
                else {
                    echo '<img class="logoPodium logoP"' ;
                }

                echo 'src="img/logo' . $system->hname . '_';
                $logoLvl = App\System::select('logo_lvl')->where('systems.name', '=', $system->hname)->first()->logo_lvl;
                echo $logoLvl.'.png"';
                echo' alt="logo de la system"> ';
                echo '<p class="numberRanking">'.$rank.'</p>';
                echo '<p>'.$system->pts.' pts</p>';
                echo '</section>';
            }

            ?>

        </section>

    </section>
    <section id="historySection">

        <h2>Historique des derniers points</h2>

        <section id=history>
            <div id=historyDiv>
        <p class="homePage">
        <?php
                $rank=0;
                $mvt_points = App\Mvt_point::select(
                        'users.first_name', 'systems.name AS hname',
                        'mvt_points.label AS lab', 'mvt_points.*' ,
                        'users.id AS idUser', 'users.logo_lvl AS logoUser')
                    ->join('users', 'mvt_points.users_id', '=', 'users.id')
                    ->join('systems', 'users.system_id', '=', 'systems.id')
                    ->orderBy ('mvt_points.created_at', 'DESC')
                    ->limit(20)->get();

            foreach ($mvt_points as $mvt) {
                    # badly named, todo change it
                    $rank++;

                    echo '<img class="systemIcon" src="img/logo' . $mvt->hname . '_';
                    //$logoLvl = App\User::select('logo_lvl')->where('systems.name', '=', $system->hname)->first()->logo_lvl;
                    echo $mvt->logoUser . '.png"';
                    echo' alt="logo de la system"> ';
                    echo " [", date('d/m H:i', strtotime($mvt->created_at)), "] ", $mvt->first_name, " : ", $mvt->nbr_points, " [", $mvt->lab, "]";
                    echo '<br/>';
                    if(intdiv(sizeof($mvt_points),2)==$rank){
                        echo "</p>";
                        echo "<p class='homePage' >";
                    }
                }

            ?>
            </p>
            </div>
        </section>

    </section>
</section>

@include('footer')

</body>

</html>
