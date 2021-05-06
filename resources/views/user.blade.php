<!DOCTYPE html>
<html lang="fr">
<?php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
?>

<head>
    <meta charset="UTF-8">
    <title>Coding system</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/all.css"/>
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
            echo '<h1>'. Auth::user()->first_name ." ". Auth::user()->last_name .'</h1>';
        ?>

        <div id="statsUser">
            <div id="logoUserSystem">

            <?php

            $mvt_point = DB::select('SELECT systems.name AS hName
                FROM systems
                LEFT JOIN users
                    ON users.system_id = systems.id
                WHERE users.id =:id', ['id' => Auth::user()->id]);

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
                WHERE users.id =:id', ['id' => Auth::user()->id]);
                echo $logoLvl[0]->logo_lvl.'.png"';
            }
            else {
                echo ' src="img/logo.png"';
            }
            echo ' alt="logo">';

                $userType = DB::select('SELECT statut
                    FROM users
                    WHERE id = :id', ['id' => Auth::user()->id]);

                if(Auth::user()->statut == 'student'){

                    $isQuizzDone = DB::select('SELECT quizz_is_done AS statusQuizz
                    FROM result_test
                    WHERE users_id = :id', ['id' => Auth::user()->id]);

                    if($isQuizzDone[0]->statusQuizz == 0){
                        echo'<a id="quizzLink" href="/quizz">Quizz</a>';
                    }
                }

            ?>

            </div>

            <div>
                <p id="stats">
                    <h2>Statistiques</h2>

                <?php

                    if(Auth::user()->statut == 'PO'){
                        echo'<br>Points donnés : ';
                        $givenPts = DB::select('SELECT total_given_pts as pts
                            FROM users
                            WHERE users.id= :id ', ['id' => Auth::user()->id]);
                        echo $givenPts[0]->pts." pts";

                        echo '<br>Event organisés : ';
                    }
                    else {
                        echo '<br>Total de points : ';
                        $totalPts = DB::select('SELECT total_pts as pts
                            FROM users
                            WHERE users.id= :id', ['id' => Auth::user()->id]);
                        echo $totalPts[0]->pts." pts";

                        echo '<br>Défis gagnés : ';
                        $defisWon = DB::select('SELECT total_won_defis as pts
                            FROM users
                            WHERE users.id= :id ', ['id' => Auth::user()->id]);
                        echo $defisWon[0]->pts;

                        echo '<br>Classement général : ';

                        $ranking = DB::select('SELECT users.total_pts AS pts, users.first_name, users.last_name , systems.name AS hname, users.id AS idU
                            FROM users
                            LEFT JOIN systems
                            	ON systems.id = users.system_id
                            WHERE users.statut="student"
                            GROUP BY users.id
                            ORDER BY pts DESC');
                        $x =0;
                        while($ranking[$x]->idU != Auth::user()->id){
                            $x++;
                        }
                        echo $x+1;

                        echo '<br>Classement system : ';

                        $userSystems = DB::select('SELECT system_id
                            FROM users
                            WHERE id = :id', ['id' => Auth::user()->id]);
                        //echo $userSystems[0];

                        if(isset($userSystems[0]->system_id)){
                            $ranking = DB::select('SELECT users.total_pts AS pts, users.first_name, users.last_name , systems.name AS hname, users.id AS idU
                            FROM users
                            LEFT JOIN systems
                            	ON systems.id = users.system_id
                            WHERE users.statut="student"
								AND systems.id = (
                                	SELECT systems.id
                                    FROM systems
                                	LEFT JOIN users AS userBIS
                                		ON userBIS.system_id = systems.id
                                	WHERE userBIS.id = :id
                                	LIMIT 1)
                            GROUP BY users.id
                            ORDER BY pts DESC', ['id' => Auth::user()->id]);
                            $x =0;
                            while($ranking[$x]->idU != Auth::user()->id){
                                $x++;
                            }
                            echo $x+1;

                        }
                    }
                ?>

                    <br>
            </div>

            <div id="cssThemeSwitcher">

                <h2>Thème</h2>

                <button id="defaultTheme" class="cssTheme"
                        onclick='document.cookie = "themeCookie=default"; path="/";
                document.getElementById("cssTheme").href="css/themes/default.css";
                ;'>Thème Coding Systems
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

if (Auth::user()->statut == 'PO'){

    echo '<div id="addPoints"><div id="addPts"><h2>Ajouter des points</h2>';
$studentList = DB::table('users')
->where('statut', 'student')
->whereNotNull('system_id')
->get();

echo '<form name="addPointsForm" method="post">'. csrf_field() .
    '<section class="addPoints">
    <label class="student">Eleve<br/>
    <input id="studentInput"  name="searchStudent" type="searchStudent">

    <p id="notFound" class="disabled">Oups. Ce que tu cherches n\'existe pas...</p>

    <select required="required" id="selectStudent" name="studentId" size="5">';

    foreach ($studentList as $student){
      echo '<option id="'.$student->id.'" value="'.$student->id.'">'.$student->first_name." ".$student->last_name.'</option>';
    }

    echo '<script>
    const searchBarStudent = document.getElementById("studentInput");
    searchBarStudent.addEventListener("keyup", e => {
    const searchString = e.target.value;
    let input = document.getElementById("studentInput").value;
    input = input.toLowerCase();
    var selectElmtStudent = document.getElementById("selectStudent").options;
    j = 0

    for (i = 0; i < selectElmtStudent.length; i++) {
        var optionselmStudent = selectElmtStudent[i].text;
        var optionidStudent = selectElmtStudent[i].id;
        console.log(optionselmStudent);
        if (!optionselmStudent.toLowerCase().includes(searchString)) {
            document.getElementById(optionidStudent).classList.add("disabled");
            j++

            if (j >= selectElmtStudent.length){
                document.getElementById("selectStudent").classList.add("disabled");
                document.getElementById("notFound").classList.remove("disabled");
            }
        }
        else {
            document.getElementById(optionidStudent).classList.remove("disabled");
            document.getElementById("selectStudent").classList.remove("disabled");
            document.getElementById("notFound").classList.add("disabled");
        }
    }
})
</script>';

   echo '</select>
    </label> </br>
    <label class="points">Raison<br/>
    <input required="required" name="reason" type="text"/>';

   echo '
    </label> </br>
    <label class="points">Nombre de points<br/>
    <input required="required" name="nbrPoints" type="number" max="1000" style="width:80px;"/>
    </label>
    </br>
    <input type="submit" name="envoi">

    </section>

</form></div>';

if(isset($_POST['envoi'])){

      $nbr_points = $_POST['nbrPoints'];
      $student_id = $_POST['studentId'];
      $reason = $_POST['reason'];
      date_default_timezone_set('Europe/Paris');
      $date = date("Y-m-d H:i:s");

      $student_points = DB::table('users')
      ->select('users.id', 'users.total_pts', 'users.total_pts_po')
      ->where('id', $student_id)
      ->get();

      $systems = DB::table('users')
      ->select('users.system_id', 'users.id')
      ->where('id', $student_id)
      ->get();

      foreach ($systems as $system){
            $system_id = $system->system_id;
      }

      $system_pts = DB::table('systems')
      ->select('systems.total_pts', 'systems.total_pts_po')
      ->where('id', $system_id)
      ->get();

      foreach ($system_pts as $add_system_pts){
            $system_total_pts = $add_system_pts->total_pts;
      }

      foreach ($system_pts as $add_system_pts_po){
            $system_total_pts_po = $add_system_pts->total_pts_po;
      }

      foreach ($student_points as $add){
            $total_pts = $add->total_pts;
      }

      foreach ($student_points as $add){
            $total_pts_po = $add->total_pts_po;
      }

      $professor_pts = DB::table('users')
      ->select('users.total_given_pts')
      ->where('id', Auth::user()->id)
      ->get();

      foreach ($professor_pts as $professor){
          $given_pts = $professor->total_given_pts;
      }


      DB::table('mvt_points')->insert(
          array(
              'nbr_points' => "$nbr_points",
              'users_id' => "$student_id",
              'label' => "$reason",
              'created_at' => "$date",
              'professor_id' =>Auth::user()->id
          )
      );

      DB::table('users')
      ->where("id", Auth::user()->id)
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

      DB::table('systems')
      ->where("id", $system_id)
      ->update(
          array(
              'total_pts'=>"$nbr_points"+"$system_total_pts"
          )
      );

      DB::table('systems')
      ->where("id", $system_id)
      ->update(
          array(
              'total_pts_po'=>"$nbr_points"+"$system_total_pts_po"
          )
      );
}

}

    $studentList = DB::table('users')
        ->where('statut', 'student')
        ->whereNotNull('system_id')
        ->get();

    echo '</div>';

    if(isset($_POST['envoiNote'])){

        $nbr_points = $_POST['nbrPoints'];
        $student_id = $_POST['studentId'];
        $note_id = $_POST['noteId'];
        date_default_timezone_set('Europe/Paris');
        $date = date("Y-m-d H:i:s");

        $system = DB::table('users')
            ->select('users.system_id AS systemId', 'users.id')
            ->where('id', $student_id)
            ->get();

        $systemId=$system[0]->systemId;
        foreach ($system as $system){
            $system_id = $system->systemId;
        }

        DB::table('mvt_points')->insert(
            array(
                'nbr_points' => "$nbr_points",
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

        DB::table('systems')
            ->where("id", $system_id)
            ->increment('total_pts',"$nbr_points"
            );

        DB::table('systems')
            ->where("id", $system_id)
            ->increment('total_pts_note',"$nbr_points"
            );

        unset($_POST);
    }

echo "</div>";
?>

        <div id="historyUser">
            <h2>Historique</h2>

            <?php
            if(Auth::user()->statut=='student'){
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

                    if(Auth::user()->statut=='PO'){
                        $mvt_point = DB::table('mvt_points')
                            ->join ('users AS student', 'mvt_points.users_id', '=', 'student.id')
                            ->join ('users AS PO', 'mvt_points.professor_id', '=', 'PO.id')
                            ->join ('systems', 'student.system_id', '=', 'systems.id')
                            ->select ('student.first_name AS sName', 'mvt_points.*')
                            ->where('PO.id', Auth::user()->id)
                            ->orderBy ('mvt_points.created_at', 'DESC')
                            ->limit(50)
                            ->get();

                        $nbr =0;
                        foreach ($mvt_point as $point){
                            $nbr++;

                            echo '['.date('d/m H:i', strtotime($point->created_at)).'] ' . $point->nbr_points . ' pts '.'['.$point->sName.'] '.'</br>';
                            if($nbr==intdiv(sizeof($mvt_point),2))  {
                                echo '</p>';
                                echo '<p>';
                            }
                        }
                    }

                    else {

                        if(isset($_POST['rank'])){
                            switch ($_POST['rank']){
                                case 'ptsDefi':
                                case 'ptsNote':
                                case 'ptsPO' :
                                    $mvt_point = DB::table('mvt_points')
                                        ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                                        ->join ('systems', 'users.system_id', '=', 'systems.id')
                                        ->select ('users.first_name', 'systems.name AS hname', 'mvt_points.*', 'users.id AS idUser')
                                        ->where('users.id', Auth::user()->id)
                                        ->orderBy ('mvt_points.created_at', 'DESC')
                                        ->limit(50)
                                        ->get();
                                    break;
                                default :
                                    $mvt_point = DB::table('mvt_points')
                                        ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                                        ->join ('systems', 'users.system_id', '=', 'systems.id')
                                        ->select ('users.first_name', 'systems.name AS hname', 'mvt_points.*', 'users.id AS idUser')
                                        ->where('users.id', Auth::user()->id)
                                        ->orderBy ('mvt_points.created_at', 'DESC')
                                        ->limit(50)
                                        ->get();
                            }
                        }
                        else{
                            $mvt_point = DB::table('mvt_points')
                                ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                                ->join ('systems', 'users.system_id', '=', 'systems.id')
                                ->select ('users.first_name', 'systems.name AS hname', 'mvt_points.*', 'users.id AS idUser')
                                ->where('users.id', Auth::user()->id)
                                ->orderBy ('mvt_points.created_at', 'DESC')
                                ->limit(50)
                                ->get();
                            }


                        $nbr =0;
                        foreach ($mvt_point as $point){
                            $nbr++;

                            echo '['.date('d/m H:i', strtotime($point->created_at)).'] '.$point->nbr_points.' pts '.'['.$point->label.'] '.'</br>';
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
