<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Coding house</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/houses.scss"/>
</head>

<body>

@include("header")

<div class="container">

  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>

  <div class="card" id="Crackend_card">
    <div class="cardContent">
      <h3 class="title">Crack'End</h3>
      <div class="bar">
        <div class="emptybar"></div>
        <div class="filledbar"></div>
      </div>
      <div class="houseInfos">
        <section class="houseStory">
          <p>
            <img class="houseIconStory" src="img/logoCrackend.png" alt="logo de la maison">
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

          <form class="houseRankForm">
            <select>
              <option>Ordre alphabétique</option>
              <option>Nombre de points</option>
              <option>Nombre de défis gagnés</option>
            </select>
            <button>Valider</button>
          </form>

          <div class="listMembers">
            <p>
                <?php
                use Illuminate\Support\Facades\DB;
                ?>
                <?php
                $results = DB::select('select * from users where house_id= :id', ['id' => 1]);
                foreach ($results as $users){
                    echo '-'.$users->first_name."<br/>";
                }
                ?>
            </p>
            <p>
                <?php

                $results = DB::select('select * from users as U, mvt_points as MP where U.house_id= :id', ['id' => 1]);
                foreach ($results as $users){
                    $users_id = DB::table('mvt_points')
                        ->join ('users', 'mvt_points.users_id', '=', 'users.id')
                        ->get();
                    echo '-'.$users->first_name.' '.$mvt_points->label."pts<br/>";
                }
                ?>
            </p>
          </div>
        </section>
      </div>
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
          <img class="houseIconStory" src="img/logoGitsune.png" alt="logo de la maison">
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

        <form class="houseRankForm">
          <select>
            <option>Ordre alphabétique</option>
            <option>Nombre de points</option>
            <option>Nombre de défis gagnés</option>
          </select>
          <button>Valider</button>
        </form>

        <div class="listMembers">
            <p>
                <?php

                $results = DB::select('select * from users where house_id= :id', ['id' => 3]);
                foreach ($results as $users){
                    echo '-'.$users->first_name."<br/>";
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
          <img class="houseIconStory" src="img/logoPhoenixml.png" alt="logo de la maison">
        </p>
        <h2 class="secretTitle">Histoire</h2>
        <p class="story secret">
            Créer, ça c'est leur spécialité !
            Vous manquez d'idées ? Allez voir un PhoeniXML il saura vous en proposer, ils n'en sont jamais à court !
            D'après certaines rumeurs ils peuvent faire apparaître ce qu'ils veulent en un claquement de doigts.
            <br>Le feu ne leur à jamais fait peur, ils ont même appris à le dompter et le maitriser.
        </p>
      </section>
      <section class="houseMembers secret">

        <h2>Membres</h2>

        <form class="houseRankForm">
          <select>
            <option>Ordre alphabétique</option>
            <option>Nombre de points</option>
            <option>Nombre de défis gagnés</option>
          </select>
          <button>Valider</button>
        </form>

        <div class="listMembers">
            <p>
                <?php

                $results = DB::select('select * from users where house_id= :id', ['id' => 2]);
                foreach ($results as $users){
                    echo '-'.$users->first_name."<br/>";
                }
                ?>
            </p>
            <p>
                <?php

                $results = DB::select('select * from users where house_id= :id', ['id' => 2]);
                foreach ($results as $users){
                    echo '-'.$users->first_name."<br/>";
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
