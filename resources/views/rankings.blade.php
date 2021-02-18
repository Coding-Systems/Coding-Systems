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
    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/all.css"/>
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
                <option value="total_pts">Tout les points</option>
                <option value="total_pts_po">Points gagnés avec PO</option>
                <option value="total_pts_defi">Points gagnés avec les défis</option>
                <option value="total_pts_note">Points gagnés avec les notes</option>
            </select>
            <button>Valider</button>
        </form>

        <h2>Classement général</h2>

        <section id=logoHousesPodium>

            <?php

            if(isset($_POST['rank'])){
                $results = App\House::select($_POST['rank'] . ' AS pts', 'houses.name AS hname')
                    ->orderBy('pts', 'DESC')
                    ->get();
            }
            else {
                $results = App\House::select('total_pts AS pts', 'houses.name AS hname')
                    ->orderBy('pts', 'DESC')
                    ->get();
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

                echo 'src="img/logo' . $house->hname . '_';
                $logoLvl = App\House::select('logo_lvl')->where('houses.name', '=', $house->hname)->first()->logo_lvl;
                echo $logoLvl . '.png"';
                echo ' alt="logo de la maison"> ';
                echo '<p class="numberRanking">' . $rank . '</p>';
                echo '<p>' . $house->pts . ' pts</p>';
                echo '</section>';
            }

            ?>

        </section>

    </section>
    <section>

        <h2>Classement solo</h2>

        <section id=rankingNamesUsers>
            <div id=rankingNamesUsersDiv>
            <p class="rankPage">
                <?php

                if(isset($_POST['rank'])){
                    $results = App\User::select('users.' . $_POST['rank'] . ' AS pts', 'users.first_name', 'users.last_name', 'houses.name AS hname', 'users.id AS idUser')
                        ->leftJoin('houses', 'houses.id', '=', 'users.house_id')
                        ->where('users.statut', '=', 'student')
                        ->groupBy('users.id')
                        ->orderBy('pts', 'DESC')
                        ->get();
                }
                else{
                    $results = App\User::select('users.total_pts AS pts', 'users.first_name', 'users.last_name', 'houses.name AS hname', 'users.id AS idUser')
                        ->leftJoin('houses', 'houses.id', '=', 'users.house_id')
                        ->where('users.statut', '=', 'student')
                        ->groupBy('users.id')
                        ->orderBy('pts', 'DESC')
                        ->get();
                }

                if (sizeof($results)==0) {
                    echo "Il n'y a encore rien à afficher ici !";
                }

                    $rank = 0;
                    foreach ($results as $users) {
                        $rank++;

                        if(isset($users->hname)) {
                            echo '<img class="houseIcon" src="img/logo' . $users->hname . '_';
                            $logoLvl = App\House::select('logo_lvl')->where('houses.name', '=', $house->hname)->first()->logo_lvl;
                            echo $logoLvl . '.png"';
                        }
                        else {
                            echo '<img class="houseIcon" src="img/logo.png"';
                        }
                        
                        echo' alt="logo de la maison"> ';
                        echo '<span ';
                        if ($rank <=3){
                            echo 'class= "userRank_'.$rank.'" ';
                        }
                        echo '>'.$rank .'. '. $users->first_name . ' : ' . $users->pts . " pts</span><br/>";

                        if(intdiv(sizeof($results),2)==$rank){
                            echo "</p>";
                            echo "<p>";
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
