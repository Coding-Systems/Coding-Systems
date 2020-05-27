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

        <form class="triHouseRankForm">
            <select>
                <option>Nombre de points gagnés avec les défis</option>
                <option>Nombre de points gagnés avec les challenges</option>
                <option>Nombre de défis gagnés</option>
                <option>Nombre de challenges gagnés</option>
            </select>
            <button>Valider</button>
        </form>

        <h2>Classement général</h2>

        <section id=logoHousesPodium>

            <section>
                <img class="logoPodium" src="img/logoGitsune.png" alt="logo de la maison">
                <p class="numberRanking">2</p>
                <p>486 pts</p>
            </section>
            <section>
                <img class="logoPodiumFirst" src="img/logoPhoenixml.png" alt="logo de la maison">
                <p class="numberRanking">1</p>
                <p>587 pts</p>
            </section>
            <section>
                <img class="logoPodium" src="img/logoCrackend.png" alt="logo de la maison">
                <p class="numberRanking">3</p>
                <p>284 pts</p>
            </section>

        </section>

    </section>
    <section>

        <h2>Classement solo</h2>

        <section id=rankingNamesUsers>

            <p>
                <?php

              /*  $test = DB::table('mvt_points')
                ->groupBy('users_id')
                ->sum('label');
                
                echo $test;
                /*foreach ($test as $total) {
                    echo "$total->label";
                }*/
                

                $users = DB::table('mvt_points')
                    ->select('mvt_points.label', 'mvt_points.users_id', 'users.first_name', 'users.last_name', 'houses.name')
                    ->join('users', 'mvt_points.users_id', '=', 'users.id')
                    ->join('houses', 'users.house_id', '=', 'houses.id')
                    ->get();
                 
                    
                $rank=0;

                foreach ($users as $user) {

                    $rank = $rank+1;
                    echo '<img class="houseIcon" src="img/logo.png" alt="logo de la maison">'.$rank.". ".$user->first_name." ".$user->last_name." : "."</br>";


                    if(intdiv(sizeof($users),2)==$rank){
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
