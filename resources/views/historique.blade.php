<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/historique.scss"/>

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
            <select>
                <option>Tout</option>
                <option>Gitsune</option>
                <option>Crack'end</option>
                <option>PhoeniXML</option>
                <option>Défis</option>
                <option>Events</option>
            </select>
        </label>
    </div>
    <section id=history>


         <p>
            <?php
                use Illuminate\Support\Facades\DB;
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
                    if(intdiv(sizeof($mvt_points),2)==$rank){
                        echo "</p>";
                        echo "<p>";
                    }
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
                    echo " [", $user->created_at, "] ", $user->first_name, " : ", $user->label, " [", $user->tname, "]" ; 
                    echo '<br/>';
                }
            ?>
        </p>


    </section>

</section>


@include('footer')

</body>

</html>

