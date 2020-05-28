<!DOCTYPE html>
<html lang="fr">
<?php
    use Illuminate\Support\Facades\DB;
    $idUser =5;
?>

<head>
    <meta charset="UTF-8">
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/user.scss"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>

<body class="rules">

@include("header")

<section>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>

    <div id="user">

        <?php

        $userName = DB::select('SELECT first_name, last_name
            FROM users
            WHERE id = :id', ['id' => $idUser]);

        foreach ($userName as $user){
            echo '<h1>'.$user->first_name." ".$user->last_name.'</h1>';
        }
        ?>

        <div id="statsUser">

            <?php

            $mvt_point = DB::select('SELECT houses.name AS hName
                FROM houses
                LEFT JOIN users
                    ON users.house_id = houses.id
                WHERE users.id =:id', ['id' => $idUser]);


            echo '<img id="logoUser" ';

            if(isset($mvt_point[0]->hName)){
                switch ($mvt_point[0]->hName){
                    case 'Crackend' :
                        echo 'src="img/logoCrackend.png"';
                        break;
                    case 'PhoeniXML' :
                        echo 'src="img/logoPhoeniXML.png"';
                        break;
                    case 'Gitsune' :
                        echo 'src="img/logoGitsune.png"';
                        break;
                    default :
                        echo 'src="img/logo.png"';
                }
            }

            else {
                echo 'src="img/logo.png"';
            }



            echo 'alt="logo">';

            ?>

            <!--Logo évolutif chez les étudiants -->

            <div>
                <p id="stats">
                    <h2>Statistiques</h2>

                <?php

                $userType = DB::select('SELECT statut
                    FROM users
                    WHERE id = :id', ['id' => $idUser]);

                    if($userType[0]->statut=='PO'){
                        echo'<br>Points donnés : ';

                        $givenPts = DB::select('SELECT SUM(label) AS pts
                            FROM mvt_points
                            LEFT JOIN users
                                ON users.id = mvt_points.professor_id
                            WHERE users.id= :id ', ['id' => $idUser]);

                        echo $givenPts[0]->pts." pts";


                        echo '<br>Event organisés : ';
                    }
                    else {
                        echo '<br>Total de points : ';

                        $givenPts = DB::select('SELECT SUM(label) AS pts
                            FROM mvt_points
                            LEFT JOIN users
                                ON users.id = mvt_points.users_id
                            WHERE users.id= :id ', ['id' => $idUser]);

                        echo $givenPts[0]->pts." pts";

                        echo '<br>Défis lancés :';
                        echo '<br>Défis gagnés :';
                        echo '<br>Classement général :';

                        

                        echo '<br>Classement maison :';
                    }
                ?>

                    <br>
                </p>
            </div>

            <div id="cssThemeSwitcher">

                <h2>Thème</h2>

                <button id="defaultTheme" class="cssTheme"
                        onclick='document.cookie = "themeCookie=default"; path="/";
                document.getElementById("cssTheme").href="css/themes/default.css";
                ;'>Thème Coding Houses
                </button>
                <button id="crackendTheme" class="cssTheme"
                        onclick='document.cookie = "themeCookie=crackend"; path="/";
                document.getElementById("cssTheme").href="css/themes/crackend.css";
                ;'>Thème Crack'end
                </button>
                <button id="phoenixmlTheme" class="cssTheme"
                        onclick='document.cookie = "themeCookie=phoenixml"; path="/";
                document.getElementById("cssTheme").href="css/themes/phoenixml.css";
                ;'>Thème PhoeniXML
                </button>
                <button id="gistuneTheme" class="cssTheme"
                        onclick='document.cookie = "themeCookie=gitsune"; path="/";
                document.getElementById("cssTheme").href="css/themes/gitsune.css";

                ;')>Thème Gitsune
                </button>

            </div>

        </div>
        <div id="hirtoryUser">
            <h2>Historique</h2>

            <form class="HistoryForm">
                <select>
                    <option>Tout</option>
                    <option>Défis</option>
                    <option>Notes</option>
                </select>
                <button>Valider</button>
            </form>

            <section id="history">
                <p>
                    <?php

                    if($userType[0]->statut=='PO'){
                        $mvt_point = DB::select('SELECT * , type_points.name AS typePTS, student.first_name as sName
                            FROM mvt_points
                            LEFT JOIN users as PO
                                ON PO.id = mvt_points.professor_id
                            LEFT JOIN users as student
                                ON student.id = mvt_points.users_id
                            LEFT JOIN type_points
                                ON type_points.id = mvt_points.type_point_id
                            WHERE PO.id = :id
                            ORDER BY mvt_points.created_at DESC  ', ['id' => $idUser]);

                        $nbr =0;
                        foreach ($mvt_point as $point){
                            $nbr++;

                            echo '['.date('d/m H:i', strtotime($point->created_at)).'] '.$point->label.' pts '.'['.$point->sName.'] '.'</br>';
                            if($nbr==intdiv(sizeof($mvt_point),2))  {
                                echo '</p>';
                                echo '<p>';
                            }
                        }
                    }

                    else {
                        $mvt_point = DB::select('SELECT * , type_points.name AS typePTS
                            FROM mvt_points
                            LEFT JOIN users
                                ON users.id = mvt_points.users_id
                            LEFT JOIN type_points
                                ON type_points.id = mvt_points.type_point_id
                            WHERE users.id= :id
                            ORDER BY mvt_points.created_at DESC', ['id' => $idUser]);

                        $nbr =0;
                        foreach ($mvt_point as $point){
                            $nbr++;

                            echo '['.date('d/m H:i', strtotime($point->created_at)).'] '.$point->label.' pts '.'['.$point->typePTS.'] '.'</br>';
                            if($nbr==intdiv(sizeof($mvt_point),2))  {
                                echo '</p>';
                                echo '<p>';
                            }
                        }
                    }

                    ?>
                </p>
            </section>

            <section>
                <div style="z-index: 999999" class="mypanel"></div>
            </section>

        </div>

    </div>

</section>

@include("footer")

</body>

</html>
