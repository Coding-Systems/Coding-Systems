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
    <link rel="stylesheet" href="css/pages/houses.scss"/>
    <link href="resources/js/app.js">

</head>

<body>

@include("header")

<div class="container">

  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>

  <div class="card" id="Crackend_card">
      <h3 class="title">Crack'End</h3>
      <div class="bar">
        <div class="emptybar"></div>
        <div class="filledbar"></div>
      </div>
      <div class="houseInfos">
        <section class="houseStory">
          <p>
              <?php
              echo '<img class="houseIconStory" src="img/logoCrackend_';
              $logoLvl = DB::select('SELECT logo_lvl
                        FROM houses
                        WHERE houses.name ="Crackend"');
              echo $logoLvl[0]->logo_lvl;
              echo '.png" alt="logo de la maison">'
              ?>
          </p>
          <h2 class="secretTitle">Histoire</h2>
          <p class="story secret">
              Passer entre les mailles du filet, c'est leur spécialité, et les bons plans, c'est leur passion.
              Besoin d'un code promo ? Pas de problème, ils en ont tout un répertoire !
              Envie d'optimiser votre machine ? Un Crackend sera forcément vous éclairer.
              Des rumeurs disent qu'ils arrivent à avoir gratuitement certains logiciel payants :O
              <br>Ils ont également une grande affinité avec l'élément de l'eau et peuvent le controler.
          </p>
        </section>
        <section class="houseMembers secret">
          <h2>Membres</h2>

            <form method="post" class="houseRankForm">
                {{ csrf_field() }}
                <select id="triMembre1" name="triMembre1">
                    <option value="alpha">Ordre alphabétique</option>
                    <option value="NbPoints">Nombre de points</option>
                    <option value="ptsDefis">Points de défis</option>
                </select>
                <button>Valider</button>
            </form>
            <button>Valider</button>
          </form>

          <div class="listMembers">
            <p>
                <?php
                if(isset($_POST['triMembre1'])){
                    switch ($_POST['triMembre1']){
                        case 'alpha' :
                            $results = DB::select('SELECT total_pts AS pts, users.id AS idUser, users.first_name
                                 FROM users
                                 WHERE house_id=1
                                 ORDER BY users.first_name ASC');
                            break;
                            /*
                        case 'NbPoints'  :
                            $results = DB::select('SELECT SUM(mvt_points.label) AS pts, users.first_name
                                        FROM mvt_points
                                        LEFT JOIN users
                                            ON users.id = mvt_points.users_id
                                        LEFT JOIN houses
                                            ON houses.id = users.house_id
                                        WHERE houses.id = 1
                                        GROUP BY mvt_points.users_id
                                        ORDER BY pts DESC', ['id' => 1]);
                            break;*/
                        case 'ptsDefis' :
                            $results = DB::select('SELECT total_pts_defi AS pts, users.id AS idUser, users.first_name
                                 FROM users
                                 WHERE house_id=1
                                 ORDER BY pts DESC');
                            break;
                        default :
                            $results = DB::select('SELECT total_pts AS pts, users.id AS idUser, users.first_name
                             FROM users
                             WHERE house_id=1
                             ORDER BY pts DESC');
                    }
                }
                else {
                    $results = DB::select('SELECT total_pts AS pts, users.id AS idUser, users.first_name
                             FROM users
                             WHERE house_id=1
                             ORDER BY pts DESC');
                }
                $rank=0;
                foreach ($results as $users) {
                    $rank++;
                    echo '<img class="houseIcon" src="img/logoCrackend_';
                    if($rank<=3){
                        echo 'R'.$rank.'.png"';
                    }else {
                        $logoLvl = DB::select('SELECT logo_lvl
                                FROM users
                                WHERE users.id = :id',['id' => $users->idUser] );
                        echo $logoLvl[0]->logo_lvl.'.png"';
                    }
                    echo 'alt="logo">';
                    echo ''.$rank." .". $users->first_name . ' : ' . $users->pts . " pts<br/>";
                    if($rank==intdiv(sizeof($results),2))  {
                        echo '</p>';
                        echo '<p>';
                    }
                }
                ?>
            </p>
          </div>
        </section>
      </div>
  </div>
  <div class="card" id="Gitsune_card">
    <h3 class="title">Gitsune</h3>
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar"></div>
    </div>
    <div class="houseInfos">
      <section class="houseStory">
        <p>
          <?php
              echo '<img class="houseIconStory" src="img/logoGitsune_';
          $logoLvl = DB::select('SELECT logo_lvl
                        FROM houses
                        WHERE houses.name ="Gitsune"');
          echo $logoLvl[0]->logo_lvl;
          echo '.png" alt="logo de la maison">'
          ?>

        </p>
        <h2 class="secretTitle">Histoire</h2>
        <p class="story secret">
            L'organiation, ça c'est important !
            Avec les Gitsune tout est toujours plus simple.
            Certains disent qu'ils ont le pouvoir de retourner dans le temps...
            <br>Ils ont toujours eu un lien étroit avec l'élément de la terre.
            Ce qui leur permet de maitriser l'élément à leur guise.

        </p>
      </section>
      <section class="houseMembers secret">
        <h2>Membres</h2>

          <form method="post" class="houseRankForm">
              {{ csrf_field() }}
              <select id="triMembre3" name="triMembre3">
                  <option value="alpha">Ordre alphabétique</option>
                  <option value="NbPoints">Nombre de points</option>
                  <option value="ptsDefis">Points de défis</option>
              </select>
              <button>Valider</button>
          </form>

        <div class="listMembers">
            <p>
                <?php
                if(isset($_POST['triMembre3'])){
                    switch ($_POST['triMembre3']){
                        case 'alpha' :
                            $results = DB::select('SELECT total_pts AS pts, users.id AS idUser, users.first_name
                                 FROM users
                                 WHERE house_id=3
                                 ORDER BY users.first_name ASC');
                            break;
                        case 'ptsDefis' :
                            $results = DB::select('SELECT total_pts_defi AS pts, users.id AS idUser, users.first_name
                                 FROM users
                                 WHERE house_id=3
                                 ORDER BY pts DESC');
                            break;
                        default :
                            $results = DB::select('SELECT total_pts AS pts, users.id AS idUser, users.first_name
                                 FROM users
                                 WHERE house_id=3
                                 ORDER BY pts DESC');
                    }
                }
                else {
                    $results = DB::select('SELECT total_pts AS pts, users.id AS idUser, users.first_name
                                 FROM users
                                 WHERE house_id=3
                                 ORDER BY pts DESC');
                }
                $rank=0;
                foreach ($results as $users) {
                    $rank++;
                    echo '<img class="houseIcon" src="img/logoGitsune_';
                    if($rank<=3){
                        echo 'R'.$rank.'.png"';
                    }else {
                        $logoLvl = DB::select('SELECT logo_lvl
                                FROM users
                                WHERE users.id = :id',['id' => $users->idUser] );
                        echo $logoLvl[0]->logo_lvl.'.png"';
                    }
                    echo 'alt="logo">';
                    echo ''.$rank." .". $users->first_name . ' : ' . $users->pts . " pts<br/>";
                    if($rank==intdiv(sizeof($results),2))  {
                        echo '</p>';
                        echo '<p>';
                    }
                }
                ?>
            </p>

        </div>
      </section>
    </div>
  </div>
  <div class="card" id="PhoeniXMl_Card">
    <h3 class="title">PhoeniXML</h3>
    <div class="bar">
      <div class="filledbar"></div>
      <div class="emptybar"></div>
    </div>
    <section class="houseInfos">
      <section class="houseStory">
        <p>
            <?php
            echo '<img class="houseIconStory" src="img/logoPhoeniXML_';
            $logoLvl = DB::select('SELECT logo_lvl
                        FROM houses
                        WHERE houses.name ="PhoeniXML"');
            echo $logoLvl[0]->logo_lvl;
            echo '.png" alt="logo de la maison">'
            ?>
        </p>
        <h2 class="secretTitle"> Histoire</h2>
        <p class="story secret">
            Créer, ça c'est leur spécialité !
            Vous manquez d'idées ? Allez voir un PhoeniXML il saura vous en proposer, ils n'en sont jamais à court !
            D'après certaines rumeurs ils peuvent faire apparaître ce qu'ils veulent en un claquement de doigts.
            <br>Le feu ne leur à jamais fait peur, ils ont même appris à le dompter et le maitriser.
        </p>
      </section>
      <section class="houseMembers secret">

        <h2>Membres</h2>

        <form method="post" class="houseRankForm">
            {{ csrf_field() }}
          <select id="triMembre2" name="triMembre2">
            <option value="alpha">Ordre alphabétique</option>
            <option value="NbPoints">Nombre de points</option>
            <option value="ptsDefis">Points de défis</option>
          </select>
          <button>Valider</button>
        </form>

        <div class="listMembers">
            <p>
                <?php
                if(isset($_POST['triMembre2'])){
                    switch ($_POST['triMembre2']){
                        case 'alpha' :
                            $results = DB::select('SELECT total_pts AS pts, users.id AS idUser, users.first_name
                             FROM users
                             WHERE house_id=2
                             ORDER BY users.first_name ASC');
                        case 'ptsDefis' :
                            $results = DB::select('SELECT total_pts_defi AS pts, users.id AS idUser, users.first_name
                                 FROM users
                                 WHERE house_id=2
                                 ORDER BY pts DESC');
                            break;
                        default :
                            $results = DB::select('SELECT total_pts AS pts, users.id AS idUser, users.first_name
                                 FROM users
                                 WHERE house_id=2
                                 ORDER BY pts DESC');
                    }
                }
                else {
                    $results = DB::select('SELECT total_pts AS pts, users.id AS idUser, users.first_name
                                 FROM users
                                 WHERE house_id=2
                                 ORDER BY pts DESC');
                }
                $rank=0;
                foreach ($results as $users) {
                    $rank++;
                    echo '<img class="houseIcon" src="img/logoPhoeniXML_';
                    if($rank<=3){
                        echo 'R'.$rank.'.png"';
                    }else {
                        $logoLvl = DB::select('SELECT logo_lvl
                                FROM users
                                WHERE users.id = :id',['id' => $users->idUser] );
                        echo $logoLvl[0]->logo_lvl.'.png"';
                    }
                    echo 'alt="logo">';
                    echo ''.$rank." .". $users->first_name . ' : ' . $users->pts . " pts<br/>";
                    if($rank==intdiv(sizeof($results),2))  {
                        echo '</p>';
                        echo '<p>';
                    }
                }
                ?>
            </p>
        </div>
      </section>
    </section>
  </div>
</div>

@include("footer")

</body>

</html>
