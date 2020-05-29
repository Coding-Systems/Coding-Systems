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
->where('type_points.type', 'PO')
->orWhere('type_points.type', 'events')
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
    <label class="challenge">Défi
    <select required="required" name="challengeId" size="5">';
    foreach ($challengeList as $challenge){
          echo '<option value="'.$challenge->id.'">'.$challenge->name.'</option>';  
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
      
      $type_Po = DB::table('type_points')
      ->select ('type_points.type', 'type_points.id')
      ->where ('id', $challenge_id )
      ->get ();

      foreach ($student_points as $add) {
            $total_points = $add->total_pts;
            echo $total_points;
      }

      foreach ($student_points as $add){
            $total_pts_po = $add->total_pts_po;
            echo $total_pts_po;
      }
      
      foreach ($type_Po as $type) {
            $type_test = $type->type;
            echo $type_test;
      }

     if ($type_test=="PO"){
      DB::table('mvt_points')->insert(
            array(
                  'label' => "$nbr_points",
                  'users_id' => "$student_id",
                  'type_point_id' => "$challenge_id",
                  'created_at' => "$date"
            )
            );

            DB::table('users')
            ->where("id", $student_id)
            ->update(
                  array(
                        'total_pts'=> "$nbr_points"+"$total_points"
                  )
                  );

                  DB::table('users')
                  ->where("id", $student_id)
                  ->update(
                        array(
                              'total_pts_po'=> "$nbr_points"+"$total_pts_po"
                        )
                        );
            }

            
     else if($type_test=="events") {
      array(
            'label' => "$nbr_points",
            'users_id' => "$student_id",
            'type_point_id' => "$challenge_id",
            'created_at' => "$date"
      );

      DB::table('users')
      ->where("id", $student_id)
      ->update(
            array(
                  'total_pts'=> "$nbr_points"+"$total_points"
            )
            );
      }

      else {
            echo "Une erreur s'est produite. Veuillez réessayer.";
      }
     
}

?>
</section>

@include('footer')

</body>

</html>