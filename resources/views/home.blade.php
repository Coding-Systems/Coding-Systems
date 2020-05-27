<!DOCTYPE html>
<html lang="fr">
<?php
use Illuminate\Support\Facades\DB;
?>

<head>
    <meta charset="UTF-8">
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">

    @include('cssSwitcher')

    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/home.scss"/>

</head>

<body>

@include('header')

<h1>Coding Houses</h1>

<section id="rankings">
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>

    <section id="generalRanking">

        <h2>Classement général</h2>

        <section id=logoHousesPodium>

            <?php

            $results = DB::select('SELECT SUM(mvt_points.label) AS pts, houses.name AS hname
                FROM mvt_points
                LEFT JOIN users
                    ON users.id = mvt_points.users_id
                LEFT JOIN houses
                    ON houses.id = users.house_id
                GROUP BY houses.id
                ORDER BY pts DESC', ['id' => 1]);

            $rank=0;

            foreach ($results as $house){
                $rank++;
                echo '<section>';

                if($rank==1){
                    echo '<img class="logoPodiumFirst logoP"';
                }
                else {
                    echo '<img class="logoPodium logoP"' ;
                }

                if($house->hname=='Crackend'){
                    echo 'src="img/logoCrackend.png" alt="logo de la maison"> ';
                }
                else if ($house->hname=='PhoeniXML'){
                    echo 'src="img/logoPhoenixml.png" alt="logo de la maison"> ';
                }
                else if ($house->hname=='Gitsune'){
                    echo 'src="img/logoGitsune.png" alt="logo de la maison"> ';
                }
                else {
                    echo 'src="img/logo.png" alt="logo"> ';
                }


                echo '<p class="numberRanking">'.$rank.'</p>';
                echo '<p>'.$house->pts.' pts</p>';
                echo '</section>';
            }

            ?>

        </section>

    </section>
    <section>

        <h2>Historique des derniers points</h2>

        <section id=history>
        <p>
        <?php
                $rank=0;
                $mvt_points = DB::table('mvt_points')
                ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                ->join ('houses', 'users.house_id', '=', 'houses.id')
                ->join ('type_points', 'mvt_points.type_point_id', '=', 'type_points.id')
                ->select ('users.first_name', 'houses.name AS hname', 'type_points.name AS tname', 'mvt_points.*')
                ->orderBy ('mvt_points.created_at')
                ->get();
                foreach ($mvt_points as $user) {
                    $rank++;
                    if($user->hname=='Crackend'){
                        echo '<img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison">';
                    }
                    else if ($user->hname=='PhoeniXML'){
                        echo '<img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison">';
                    }
                    else if ($user->hname=='Gitsune'){
                        echo '<img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> ';
                    }
                    else {
                        echo '<img id="logoHeader" src="img/logo.png" alt="logo">';
                    }
                    echo " [", date('d/m H:i', strtotime($user->created_at)), "] ", $user->first_name, " : ", $user->label, " [", $user->tname, "]" ;
                    echo '<br/>';
                    if(intdiv(sizeof($mvt_points),2)==$rank){
                        echo "</p>";
                        echo "<p>";
                    }
                }

            ?>
            </p>
        </section>

    </section>
</section>

@include('footer')

</body>

</html>
