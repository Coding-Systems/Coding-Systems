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
    <link rel="stylesheet" href="css/pages/rankings.scss"/>
    <link href="resources/js/app.js">


    <!-- <link rel="stylesheet" href="../sass/app.css"/>
    <link rel="stylesheet" href="../sass/pages/home.css"/>-->

</head>

<body>

@include('header')

<section id="rankings">
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>

    <section id="generalRanking">

        <h1>Classement</h1>

        <form method="post" class="triHouseRankForm">
            {{ csrf_field() }}
            <select id="rank" name="rank">
                <option value="all">Tout les points</option>
                <option value="ptsPO">Points gagnés avec PO</option>
                <option value="ptsDefi">Points gagnés avec les défis</option>
                <option value="ptsNote">Points gagnés avec les notes</option>
            </select>
            <button>Valider</button>
        </form>

        <h2>Classement général</h2>

        <section id=logoHousesPodium>

            <?php

            if(isset($_POST['rank'])){
                switch ($_POST['rank']){
                    case 'ptsPO' :
                        $results = DB::select('SELECT total_pts_po AS pts, houses.name AS hname
                            FROM houses
                            ORDER BY pts DESC');
                        break;
                    case 'ptsDefi'  :
                        $results = DB::select('SELECT total_pts_defi AS pts, houses.name AS hname
                             FROM houses
                             ORDER BY pts DESC');
                        break;
                    case 'ptsNote' :
                         $results = DB::select('SELECT total_pts_note AS pts, houses.name AS hname
                            FROM houses
                            ORDER BY pts DESC');
                        break;
                    default :
                        $results = DB::select('SELECT total_pts AS pts, houses.name AS hname
                            FROM houses
                            ORDER BY pts DESC');
                }
            }
            else {
                $results = DB::select('SELECT total_pts AS pts, houses.name AS hname
                     FROM houses
                     ORDER BY pts DESC');
            }

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
                    echo 'src="img/logoCrackend_';
                    $logoLvl = DB::select('SELECT logo_lvl
                        FROM houses
                        WHERE houses.name = "Crackend" ');
                    echo $logoLvl[0]->logo_lvl.'.png"';
                    echo' alt="logo de la maison"> ';
                }
                else if ($house->hname=='PhoeniXML'){
                    echo 'src="img/logoPhoeniXML_';
                    $logoLvl = DB::select('SELECT logo_lvl
                        FROM houses
                        WHERE houses.name = "PhoeniXML" ');
                    echo $logoLvl[0]->logo_lvl.'.png"';
                    echo' alt="logo de la maison"> ';
                }
                else if ($house->hname=='Gitsune'){
                    echo 'src="img/logoGitsune_';
                    $logoLvl = DB::select('SELECT logo_lvl
                        FROM houses
                        WHERE houses.name = "Gitsune" ');
                    echo $logoLvl[0]->logo_lvl.'.png"';
                    echo' alt="logo de la maison"> ';
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

        <h2>Classement solo</h2>

        <section id=rankingNamesUsers>

            <p>
                <?php

                if(isset($_POST['rank'])){
                    switch ($_POST['rank']){
                        case 'ptsPO' :
                            $results = DB::select('SELECT users.total_pts_po AS pts, users.first_name, users.last_name , houses.name AS hname, users.id AS idUser
                            FROM users
                            LEFT JOIN houses
                            	ON houses.id = users.house_id
                            WHERE users.statut="student"
                            GROUP BY users.id
                            ORDER BY pts DESC');
                            break;

                        case 'ptsDefi' :
                            $results = DB::select('SELECT users.total_pts_defi AS pts, users.first_name, users.last_name , houses.name AS hname, users.id AS idUser
                            FROM users
                            LEFT JOIN houses
                            	ON houses.id = users.house_id
                            WHERE users.statut="student"
                            GROUP BY users.id
                            ORDER BY pts DESC');
                            break;

                        case 'ptsNote' :
                            $results = DB::select('SELECT users.total_pts_note AS pts, users.first_name, users.last_name , houses.name AS hname, users.id AS idUser
                            FROM users
                            LEFT JOIN houses
                            	ON houses.id = users.house_id
                            WHERE users.statut="student"
                            GROUP BY users.id
                            ORDER BY pts DESC');
                            break;

                        default :
                            $results = DB::select('SELECT users.total_pts AS pts, users.first_name, users.last_name , houses.name AS hname, users.id AS idUser
                            FROM users
                            LEFT JOIN houses
                            	ON houses.id = users.house_id
                            WHERE users.statut="student"
                            GROUP BY users.id
                            ORDER BY pts DESC');
                    }
                }
                else{
                    $results = DB::select('SELECT users.total_pts AS pts, users.first_name, users.last_name , houses.name AS hname, users.id AS idUser
                            FROM users
                            LEFT JOIN houses
                            	ON houses.id = users.house_id
                            WHERE users.statut="student"
                            GROUP BY users.id
                            ORDER BY pts DESC');
                }

                if (sizeof($results)==0) {
                    echo "Il n'y a encore rien à afficher ici !";
                }

                    $rank = 0;
                    foreach ($results as $users) {
                        $rank++;

                        if($users->hname=='Crackend'){
                            echo '<img class="houseIcon" src="img/logoCrackend_';
                            $logoLvl = DB::select('SELECT logo_lvl
                                FROM users
                                WHERE users.id = :id',['id' => $users->idUser] );
                            echo $logoLvl[0]->logo_lvl.'.png"';
                            echo' alt="logo de la maison"> ';                        }
                        else if ($users->hname=='PhoeniXML'){
                            echo '<img class="houseIcon" src="img/logoPhoeniXML_';
                            $logoLvl = DB::select('SELECT logo_lvl
                                FROM users
                                WHERE users.id = :id',['id' => $users->idUser] );
                            echo $logoLvl[0]->logo_lvl.'.png"';
                            echo' alt="logo de la maison"> ';
                        }
                        else if ($users->hname=='Gitsune'){
                            echo '<img class="houseIcon" src="img/logoGitsune_';
                            $logoLvl = DB::select('SELECT logo_lvl
                                FROM users
                                WHERE users.id = :id',['id' => $users->idUser] );
                            echo $logoLvl[0]->logo_lvl.'.png"';
                            echo' alt="logo de la maison"> ';                        }
                        else {
                            echo '<img id="logoHeader" src="img/logo.png" alt="logo"> ';
                        }


                        echo $rank .'. '. $users->first_name . ' : ' . $users->pts . " pts<br/>";

                        if(intdiv(sizeof($results),2)==$rank){
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
