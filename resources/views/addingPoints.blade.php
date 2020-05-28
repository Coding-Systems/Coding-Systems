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
    <link rel="stylesheet" href="css/pages/historique.scss"/>

    <!-- <link rel="stylesheet" href="../sass/app.css"/>
    <link rel="stylesheet" href="../sass/pages/home.css"/>-->

</head>

<body>

@include('header')
<section id="addPoints">
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
</section>

<section>

<?php
$studentList = DB::table('users')
->get();

$challengeList = DB::table('type_points')
->get();



echo "<form method='post' class='login'>". csrf_field() .
    "<section class='addPoints'>
    <label class='student'>Eleve
    <select size='5'>";

    foreach ($studentList as $student){

      echo '<option>'.$student->first_name.'</option>';

      };

   echo "</select>
    </label> </br>
    <label class='challenge'>Défi
    <select size='5'>";
    foreach ($challengeList as $challenge){
          echo '<option>'.$challenge->name.'</option>';
    }
   echo "</select>
    </label> </br>
    <label class='points'>Nombre de points
    <input type='number'/>
    </label>
    </br>
    <button><span>Valider</span></button>

    </section>

</form>"
?>
</section>

@include('footer')

</body>

</html>