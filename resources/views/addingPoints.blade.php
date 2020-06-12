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
->where('statut', 'student')
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

     if ($type_select=="PO"){
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

                  DB::table('users')
                  ->where("id", $student_id)
                  ->update(
                        array(
                              'total_pts_po'=> "$nbr_points"+"$total_pts_po"
                        )
                        );
            }


     else if($type_select=="events") {
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
