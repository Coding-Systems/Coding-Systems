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
</section>

<section>

    <div class="stat">

        <h1>Historique</h1>
        <div id="imgH">
        <img id="H" src="img/logo.png" alt="image de la maison">
        </div>
        <label>
        <form method="post">
        {{ csrf_field() }}
            <select id="selectHisto" name="histo">
                    <option value="all">Tout</option>
                    <option value="gitsune">Gitsune</option>
                    <option value="crackend">Crack'end</option>
                    <option value="phoenixml">PhoeniXML</option>
                    <option value="defis">Défis</option>
                    <option value="events">Events</option>
                </select>
                <input type="submit">
            </form>
        </label>
    </div>
    <section id=history>
        <div id=historyDiv>
         <p class = "historique">
            <?php

    if(isset($_POST['histo'])){
        if($_POST['histo']=="all"){
            $mvt_points = DB::table('mvt_points')
                ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                ->join ('houses', 'users.house_id', '=', 'houses.id')
                ->select ('users.first_name', 'houses.name AS hname', 'mvt_points.label AS lab', 'mvt_points.*', 'users.id AS idUser')
                ->orderBy ('mvt_points.created_at', 'DESC')
                ->limit(100)
                ->get();
        }
        elseif($_POST['histo']=="gitsune"){
            $mvt_points = DB::table('mvt_points')
                ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                ->join ('houses', 'users.house_id', '=', 'houses.id')
                ->select ('users.first_name', 'houses.name AS hname', 'mvt_points.label AS lab', 'mvt_points.*', 'users.id AS idUser')
                ->where ('houses.name', 'Gitsune')
                ->orderBy ('mvt_points.created_at', 'DESC')
                ->limit(100)
                ->get();
        }
        elseif($_POST['histo']=="crackend"){
            $mvt_points = DB::table('mvt_points')
                ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                ->join ('houses', 'users.house_id', '=', 'houses.id')
                ->select ('users.first_name', 'houses.name AS hname', 'mvt_points.label AS lab', 'mvt_points.*', 'users.id AS idUser')
                ->where ('houses.name', 'Crackend')
                ->orderBy ('mvt_points.created_at', 'DESC')
                ->limit(100)
                ->get();
        }
        elseif($_POST['histo']=="phoenixml"){
            $mvt_points = DB::table('mvt_points')
                ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                ->join ('houses', 'users.house_id', '=', 'houses.id')
                ->select ('users.first_name', 'houses.name AS hname', 'mvt_points.label AS lab', 'mvt_points.*', 'users.id AS idUser')
                ->where ('houses.name', 'phoeniXML')
                ->orderBy ('mvt_points.created_at', 'DESC')
                ->limit(100)
                ->get();
        }
        elseif($_POST['histo']=="defis"){
            $mvt_points = DB::table('mvt_points')
                ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                ->join ('houses', 'users.house_id', '=', 'houses.id')
                ->select ('users.first_name', 'houses.name AS hname', 'mvt_points.label AS lab', 'mvt_points.*', 'users.id AS idUser')
                ->orderBy ('mvt_points.created_at', 'DESC')
                ->limit(100)
                ->get();
        }
        elseif($_POST['histo']=="events"){
            $mvt_points = DB::table('mvt_points')
                ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                ->join ('houses', 'users.house_id', '=', 'houses.id')
                ->select ('users.first_name', 'houses.name AS hname', 'mvt_points.label AS lab', 'mvt_points.*', 'users.id AS idUser')
                ->orderBy ('mvt_points.created_at', 'DESC')
                ->limit(100)
                ->get();
        }
    }
    else{
            $mvt_points = DB::table('mvt_points')
                ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                ->join ('houses', 'users.house_id', '=', 'houses.id')
                ->select ('users.first_name', 'houses.name AS hname', 'mvt_points.label AS lab', 'mvt_points.*', 'users.id AS idUser')
                ->orderBy ('mvt_points.created_at', 'DESC')
                ->limit(100)
                ->get();

            }
        if ($mvt_points->isEmpty()) {
            echo "Il n'y a encore rien à afficher ici !";
        }
        else {
            $rank=0;
        foreach ($mvt_points as $user) {
            # $user is badly named here todo change it
            $rank++;
            if($user->hname=='Crackend'){
                echo '<img class="houseIcon" src="img/logoCrackend_';
                $logoLvl = DB::select('SELECT logo_lvl
                    FROM users
                    WHERE users.id = :id',['id' => $user->idUser] );
                echo $logoLvl[0]->logo_lvl.'.png"';
                echo' alt="logo de la maison"> ';            }
            else if ($user->hname=='PhoeniXML'){
                echo '<img class="houseIcon" src="img/logoPhoeniXML_';
                $logoLvl = DB::select('SELECT logo_lvl
                    FROM users
                    WHERE users.id = :id',['id' => $user->idUser] );
                echo $logoLvl[0]->logo_lvl.'.png"';
                echo' alt="logo de la maison"> ';
            }
            else if ($user->hname=='Gitsune'){
                echo '<img class="houseIcon" src="img/logoGitsune_';
                $logoLvl = DB::select('SELECT logo_lvl
                    FROM users
                    WHERE users.id = :id',['id' => $user->idUser] );
                echo $logoLvl[0]->logo_lvl.'.png"';
                echo' alt="logo de la maison"> ';            }
            else {
                echo '<img id="logoHeader" src="img/logo.png" alt="logo">';
            }
            echo " [", date('d/m H:i', strtotime($user->created_at)), "] ", $user->first_name, " : ", $user->nbr_points, " [ ", $user->lab, " ]";
            echo '<br/>';
            if(intdiv(sizeof($mvt_points),2)==$rank){
                echo "</p>";
                echo "<p class = 'historique'>";
            }
        }
    }
            ?>
        </p>
</div>

    </section>

</section>


@include('footer')

</body>

</html>

