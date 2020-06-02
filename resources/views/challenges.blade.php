<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Coding house</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/challenges.scss"/>
</head>

<body>

@include('header')

<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>

<h1>Défis</h1>

<?php

    $idUser=5;

$userType = DB::select('SELECT statut
                    FROM users
                    WHERE id = :id', ['id' => $idUser]);

if($userType[0]->statut=='student'){

    echo '<h2>Lancer un défi</h1>';
    echo "<p>L'adversaire et l'arbitre doivent être de maisons différentes !</p>";

    $listDefis = DB::select('SELECT name, id
        FROM type_points
        WHERE type="defi"');

    echo '<form name="newDefiForm" id="newDefiForm" method="post"> '. csrf_field() ; //echo '{{ csrf_field() }}';

    echo '<h3>Choisissez votre défis :</h3>';

    echo '<section class="addPoints">';
    //echo '<label class="typeDefi">Type de défi';
    echo '<select required="required" name="defiTypeId" size="5">';

    foreach ($listDefis as $defi){
        echo '<option value="'.$defi->id.'">'.$defi->name.'</option>';
    };
    echo '</select>';

    $listUsers = DB::select('SELECT first_name AS fName, last_name AS lName, users.id as Uid, houses.name AS houseName
        FROM users
        LEFT JOIN houses
        	ON houses.id =users.house_id
        WHERE house_id != (SELECT house_id
                            	FROM users AS usersOne
                            	WHERE usersOne.id = :id)
        ORDER BY houseName, fName', ['id' => $idUser]);


    echo '<h3>Choisissez votre adversaire :</h3>';

    echo '<section class="oppenents">';
    //echo '<label class="typeDefi">Type de défi';
    echo '<select required="required" name="OpponentId" size="7">';

    foreach ($listUsers as $user){
        echo '<option value="'.$user->Uid.'">'."[".$user->houseName."] ".$user->fName." ".$user->lName.'</option>';
    };
    echo '</select>';

    echo'<h3>Choisissez votre arbitre :</h3>';

    echo '<section class="arbiter">';
    //echo '<label class="typeDefi">Type de défi';
    echo '<select required="required" name="arbiterId" size="7">';

    foreach ($listUsers as $user){
        echo '<option value="'.$user->Uid.'">'."[".$user->houseName."] ".$user->fName." ".$user->lName.'</option>';
    };
    echo '</select>';

    echo '</br><input type="submit" value="Valider"> ';

    echo '</form>';
    }

    echo '<h2>Demandes en attente :</h2>';

?>

<?php
if(isset($_POST['OpponentId']) && isset($_POST['arbiterId']) &&isset($_POST['defiTypeId'])){
    //OpponentId arbiterId defiTypeId

    $listDefis = DB::select('SELECT COUNT(id) AS total
        FROM defis
        WHERE challenger_id = :id', ['id' => $idUser]);

    echo "<p>";
    if ($listDefis[0]->total==0){
        echo "Demande de défi et d'arbitrage envoyés";
    }
    else {
        echo"Vous avez déja un défi en attente de reponse. Annulez-le ou finissez-le avant de défier d'autres personnes.";
    }
    echo "</p>";



}

?>


<form class="tableDefi">
    <table>
        <tbody>
        <tr>
            <th colspan="2">Demandes de défis</th>
        </tr>
        <tr>
            <td>Smash | Vous VS Houssam | Arbitre : Marion</td>
            <td><input type="button" value="Accepter"><input type="button" value="Refuser"></td>
        </tr>
        <tr>
            <th colspan="2">Demandes d'arbitrage</th>
        </tr>
        <tr>
            <td>Smash | Hugo VS Houssam | Arbitre : Vous</td>
            <td><input type="button" value="Accepter"><input type="button" value="Refuser"></td>
        </tr>
        <tr>
            <th colspan="2">Demandes envoyées</th>
        </tr>
        <tr>
            <td>Smash | Vous VS Houssam | Arbitre : Alyssia</td>
            <td><input type="button" value="Annuler"></td>
        </tr>
        </tbody>
    </table>
</form>

@include('footer')

</body>
