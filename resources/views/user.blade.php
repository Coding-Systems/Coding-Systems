<!DOCTYPE html>
<html lang="fr">
<?php
    use Illuminate\Support\Facades\DB;
    $idUser =18;
?>

<head>
    <meta charset="UTF-8">
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/user.scss"/>
    <link href="resources/js/app.js">

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
                        echo 'src="img/logoCrackend_';
                        break;
                    case 'PhoeniXML' :
                        echo 'src="img/logoPhoeniXML_';
                        break;
                    case 'Gitsune' :
                        echo 'src="img/logoGitsune_';
                        break;
                    default :
                        echo 'src="img/logo.png"';
                }

                $logoLvl = DB::select('SELECT logo_lvl
                FROM users
                WHERE users.id =:id', ['id' => $idUser]);
                echo $logoLvl[0]->logo_lvl.'.png"';
            }
            else {
                echo ' src="img/logo.png"';
            }
            echo ' alt="logo">';

            ?>

            <div>
                <p id="stats">
                    <h2>Statistiques</h2>

                <?php

                $userType = DB::select('SELECT statut
                    FROM users
                    WHERE id = :id', ['id' => $idUser]);

                    if($userType[0]->statut=='PO'){
                        echo'<br>Points donnés : ';
                        $givenPts = DB::select('SELECT total_given_pts as pts
                            FROM users
                            WHERE users.id= :id ', ['id' => $idUser]);
                        echo $givenPts[0]->pts." pts";

                        echo '<br>Event organisés : ';
                    }
                    else {
                        echo '<br>Total de points : ';
                        $totalPts = DB::select('SELECT total_pts as pts
                            FROM users
                            WHERE users.id= :id', ['id' => $idUser]);
                        echo $totalPts[0]->pts." pts";

                        echo '<br>Défis gagnés : ';
                        $defisWon = DB::select('SELECT total_won_defis as pts
                            FROM users
                            WHERE users.id= :id ', ['id' => $idUser]);
                        echo $defisWon[0]->pts;

                        echo '<br>Classement général : ';

                        $ranking = DB::select('SELECT users.total_pts AS pts, users.first_name, users.last_name , houses.name AS hname, users.id AS idU
                            FROM users
                            LEFT JOIN houses
                            	ON houses.id = users.house_id
                            WHERE users.statut="student"
                            GROUP BY users.id
                            ORDER BY pts DESC');
                        $x =0;
                        while($ranking[$x]->idU != $idUser){
                            $x++;
                        }
                        echo $x+1;

                        echo '<br>Classement maison : ';

                        $userHouses = DB::select('SELECT house_id
                            FROM users
                            WHERE id = :id', ['id' => $idUser]);
                        //echo $userHouses[0];

                        if(isset($userHouses[0]->house_id)){
                            $ranking = DB::select('SELECT users.total_pts AS pts, users.first_name, users.last_name , houses.name AS hname, users.id AS idU
                            FROM users
                            LEFT JOIN houses
                            	ON houses.id = users.house_id
                            WHERE users.statut="student"
								AND houses.id = (
                                	SELECT houses.id
                                    FROM houses
                                	LEFT JOIN users AS userBIS
                                		ON userBIS.house_id = houses.id
                                	WHERE userBIS.id = :id
                                	LIMIT 1)
                            GROUP BY users.id
                            ORDER BY pts DESC', ['id' => $idUser]);
                            $x =0;
                            while($ranking[$x]->idU != $idUser){
                                $x++;
                            }
                            echo $x+1;

                        }
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

                    <?php

if($userType[0]->statut=='PO'){
    echo  '<div id="addPts"><h2>Création de type points</h2>';
    echo'<form name="newTypePtsForm" method="post">' . csrf_field() .
            '<label class="makePoints">
            <input name="nameTypePoints" type="text" required="require"/>
            <input type="submit" name="MakeNewPts" value="créer le type de points"/>
            </label>
        </form>';

    if(isset($_POST['MakeNewPts'])){
        $date = date("Y-m-d H:i:s");
        $nameTypePoints = $_POST['nameTypePoints'];
        DB::table('type_points')->insert(
            array(
                'name' => "$nameTypePoints",
                'type' => "note",
                'created_at' => "$date",
            )
        );
    }

    echo  '<div id="addPts"><h2>Ajouter des points</h2>';
$studentList = DB::table('users')
->where('statut', 'student')
->whereNotNull('house_id')
->get();

$challengeList = DB::table('type_points')
->where('type_points.type', 'PO')
->orWhere('type_points.type', 'events')
->get();

$typeptsList = DB::table('type_points')
->get();

echo '<form name="addPointsForm" method="post">'. csrf_field() .
    '<section class="addPoints">
    <label class="student">Eleve
    <select required="required" name="studentId" size="5">';

    foreach ($studentList as $student){
      echo '<option value="'.$student->id.'">'.$student->first_name.'</option>';
      };

   echo '</select>
    </label> </br>
    <label class="challenge">PO
    <select required="required" name="challengeId" size="5">';
    foreach ($challengeList as $challenge){
          echo '<option value="'.$challenge->id.'">'.$challenge->name.'</option>';
    }
    echo '</select>
    </label> </br>
    <label class="typePts">type de points
    <select required="required" name="typeId" size="5">';
    foreach ($typeptsList as $type){
        echo '<option value="'.$type->id.'">'.$type->name.'</option>';
    }

   echo '</select>
    </label> </br>
    <label class="points">Nombre de points
    <input required="required" name="nbrPoints" type="number"/>
    </label>
    </br>
    <input type="submit" name="envoi">

    </section>

</form>';

if(isset($_POST['envoi'])){

      $nbr_points = $_POST['nbrPoints'];
      $student_id = $_POST['studentId'];
      $challenge_id = $_POST['challengeId'];
      date_default_timezone_set('Europe/Paris');
      $date = date("Y-m-d H:i:s");

      $student_points = DB::table('users')
      ->select('users.id', 'users.total_pts', 'users.total_pts_po')
      ->where('id', $student_id)
      ->get();

      $type_pts = DB::table('type_points')
      ->select ('type_points.type', 'type_points.id')
      ->where ('id', $challenge_id )
      ->get ();

      $house = DB::table('users')
      ->select('users.house_id', 'users.id')
      ->where('id', $student_id)
      ->get();

      foreach ($house as $house){
            $house_id = $house->house_id;
      }

      $house_pts = DB::table('houses')
      ->select('houses.total_pts', 'houses.total_pts_po')
      ->where('id', $house_id)
      ->get();

      foreach ($house_pts as $add_house_pts){
            $house_total_pts = $add_house_pts->total_pts;
      }

      foreach ($house_pts as $add_house_pts_po){
            $house_total_pts_po = $add_house_pts->total_pts_po;
      }

      foreach ($student_points as $add){
            $total_pts = $add->total_pts;
      }

      foreach ($student_points as $add){
            $total_pts_po = $add->total_pts_po;
      }

      foreach ($type_pts as $type) {
            $type_select = $type->type;
      }

      $professor_pts = DB::table('users')
      ->select('users.total_given_pts')
      ->where('id', $idUser)
      ->get();

      foreach ($professor_pts as $professor){
          $given_pts = $professor->total_given_pts;
      }

     if ($type_select=="PO"){
            DB::table('mvt_points')->insert(
            array(
                  'label' => "$nbr_points",
                  'users_id' => "$student_id",
                  'type_point_id' => "$challenge_id",
                  'created_at' => "$date",
                  'professor_id' =>"$idUser"
            )
            );

            DB::table('users')
            ->where("id", $idUser)
            ->update(
                array(
                    'total_given_pts'=>"$nbr_points"+"$given_pts"
                )
                );

            DB::table('users')
            ->where("id", $student_id)
            ->update(
                  array(
                        'total_pts'=> "$nbr_points"+"$total_pts"
                  )
                  );

            DB::table('users')
            ->where("id", $student_id)
            ->update(
                  array(
                        'total_pts_po'=> "$nbr_points"+"$total_pts_po"
                  )
            );

            DB::table('houses')
            ->where("id", $house_id)
            ->update(
                  array(
                        'total_pts'=>"$nbr_points"+"$house_total_pts"
                  )
                  );
            DB::table('houses')
            ->where("id", $house_id)
            ->update(
                  array(
                        'total_pts_po'=>"$nbr_points"+"$house_total_pts_po"
                  )
                  );
            }

      else {
            echo "Une erreur s'est produite. Veuillez réessayer.";
      }

}

    $studentList = DB::table('users')
        ->where('statut', 'student')
        ->whereNotNull('house_id')
        ->get();

    $notesList = DB::table('type_points')
        ->where('type_points.type', 'note')
        ->get();

    echo '<h3>Points par notes</h3>
        <form name="addNoteForm" method="post">'. csrf_field() .
        '<section class="addPoints">
    <label class="student">Eleve
    <select required="required" name="studentId" size="5">';

    foreach ($studentList as $student){
        echo '<option value="'.$student->id.'">'.$student->first_name.'</option>';
    };

    echo '</select>
    </label> </br>
    <label class="challenge" for="noteId">Matière</label>
    <select required="required" name="noteId" id="noteId" size="5">';
    foreach ($notesList as $note){
        echo '<option value="'.$note->id.'">'.$note->name.'</option>';
    }
    echo '</select>
    </label> </br>
    <label class="points">Nombre de points
    <input required="required" name="nbrPoints" type="number"/>
    </label>
    </br>
    <input type="submit" name="envoiNote">

    </section>

</form>';

    if(isset($_POST['envoiNote'])){

        $nbr_points = $_POST['nbrPoints'];
        $student_id = $_POST['studentId'];
        $note_id = $_POST['noteId'];
        date_default_timezone_set('Europe/Paris');
        $date = date("Y-m-d H:i:s");

        $house = DB::table('users')
            ->select('users.house_id AS houseId', 'users.id')
            ->where('id', $student_id)
            ->get();

        $houseId=$house[0]->houseId;
        foreach ($house as $house){
            $house_id = $house->houseId;
        }

        DB::table('mvt_points')->insert(
            array(
                'label' => "$nbr_points",
                'users_id' => "$student_id",
                'type_point_id' => "$note_id",
                'created_at' => "$date",
            )
        );


        DB::table('users')
            ->where("id", $student_id)
            ->increment('total_pts', "$nbr_points"
            );

        DB::table('users')
            ->where("id", $student_id)
            ->increment('total_pts_note', "$nbr_points"
            );

        DB::table('houses')
            ->where("id", $house_id)
            ->increment('total_pts',"$nbr_points"
            );

        DB::table('houses')
            ->where("id", $house_id)
            ->increment('total_pts_note',"$nbr_points"
            );

        unset($_POST);
    }

}
echo "</div>";
?>

        <div id="historyUser">
            <h2>Historique</h2>

            <?php
            if($userType[0]->statut=='student'){
                echo '<form method="post" class="HistoryForm">'.csrf_field().'
                <select id="rank" name="rank">
                    <option value="all">Tout les points</option>
                    <option value="ptsPO">Points gagnés avec PO</option>
                    <option value="ptsDefi">Points gagnés avec les défis</option>
                    <option value="ptsNote">Points gagnés avec les notes</option>
                </select>
                <button>Valider</button>
            </form>';
            }
                ?>

            <section id="history">
                <div id="divHistory">
                <p>
                    <?php

                    if($userType[0]->statut=='PO'){
                        $mvt_point = DB::table('mvt_points')
                            ->join ('users AS student', 'mvt_points.users_id', '=', 'student.id')
                            ->join ('users AS PO', 'mvt_points.professor_id', '=', 'PO.id')
                            ->join ('houses', 'student.house_id', '=', 'houses.id')
                            ->join ('type_points', 'mvt_points.type_point_id', '=', 'type_points.id')
                            ->select ('student.first_name AS sName', 'type_points.name AS typePTS', 'mvt_points.*')
                            ->where('PO.id', $idUser)
                            ->orderBy ('mvt_points.created_at', 'DESC')
                            ->limit(50)
                            ->get();

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

                        if(isset($_POST['rank'])){
                            switch ($_POST['rank']){
                                case 'ptsPO' :
                                    $mvt_point = DB::table('mvt_points')
                                        ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                                        ->join ('houses', 'users.house_id', '=', 'houses.id')
                                        ->join ('type_points', 'mvt_points.type_point_id', '=', 'type_points.id')
                                        ->select ('users.first_name', 'houses.name AS hname', 'type_points.name AS typePTS', 'mvt_points.*', 'users.id AS idUser')
                                        ->where('users.id', $idUser)
                                        ->where ('type_points.type', 'PO')
                                        ->orderBy ('mvt_points.created_at', 'DESC')
                                        ->limit(50)
                                        ->get();
                                    break;
                                case 'ptsDefi';
                                    $mvt_point = DB::table('mvt_points')
                                        ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                                        ->join ('houses', 'users.house_id', '=', 'houses.id')
                                        ->join ('type_points', 'mvt_points.type_point_id', '=', 'type_points.id')
                                        ->select ('users.first_name', 'houses.name AS hname', 'type_points.name AS typePTS', 'mvt_points.*', 'users.id AS idUser')
                                        ->where('users.id', $idUser)
                                        ->where ('type_points.type', 'defi')
                                        ->orderBy ('mvt_points.created_at', 'DESC')
                                        ->limit(50)
                                        ->get();
                                     break;
                                case 'ptsNote' :
                                    $mvt_point = DB::table('mvt_points')
                                        ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                                        ->join ('houses', 'users.house_id', '=', 'houses.id')
                                        ->join ('type_points', 'mvt_points.type_point_id', '=', 'type_points.id')
                                        ->select ('users.first_name', 'houses.name AS hname', 'type_points.name AS typePTS', 'mvt_points.*', 'users.id AS idUser')
                                        ->where('users.id', $idUser)
                                        ->where ('type_points.type', 'note')
                                        ->orderBy ('mvt_points.created_at', 'DESC')
                                        ->limit(50)
                                        ->get();
                                    break;
                                default :
                                    $mvt_point = DB::table('mvt_points')
                                        ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                                        ->join ('houses', 'users.house_id', '=', 'houses.id')
                                        ->join ('type_points', 'mvt_points.type_point_id', '=', 'type_points.id')
                                        ->select ('users.first_name', 'houses.name AS hname', 'type_points.name AS typePTS', 'mvt_points.*', 'users.id AS idUser')
                                        ->where('users.id', $idUser)
                                        ->orderBy ('mvt_points.created_at', 'DESC')
                                        ->limit(50)
                                        ->get();
                            }
                        }
                        else{
                            $mvt_point = DB::table('mvt_points')
                                ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                                ->join ('houses', 'users.house_id', '=', 'houses.id')
                                ->join ('type_points', 'mvt_points.type_point_id', '=', 'type_points.id')
                                ->select ('users.first_name', 'houses.name AS hname', 'type_points.name AS typePTS', 'mvt_points.*', 'users.id AS idUser')
                                ->where('users.id', $idUser)
                                ->orderBy ('mvt_points.created_at', 'DESC')
                                ->limit(50)
                                ->get();
                            }


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

                    if (sizeof($mvt_point)==0) {
                        echo "Il n'y a encore rien à afficher ici !";
                    }
                    ?>
                </p>
                </div>
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
