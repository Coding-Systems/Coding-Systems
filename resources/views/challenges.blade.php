<!DOCTYPE html>
<html lang="fr">

<?php $idUser=1;
?>

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



$userType = DB::select('SELECT statut
                    FROM users
                    WHERE id = :id', ['id' => $idUser]);

if($userType[0]->statut=='student'){

    echo '<h2>Lancer un défi</h1>';
    echo "<p>L'adversaire et l'arbitre doivent être de maisons différentes !</p>";

    $listDefis = DB::select('SELECT name, id
        FROM type_points
        WHERE type="defi"');

    echo '<form name="newDefiForm" id="newDefiForm" method="post"> '.csrf_field() ; //echo '{{ csrf_field() }}';

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

if(isset($_POST['OpponentId']) && isset($_POST['arbiterId']) &&isset($_POST['defiTypeId'])){
    //OpponentId arbiterId defiTypeId

    $listDefis = DB::select('SELECT COUNT(id) AS total
        FROM defis
        WHERE challenger_id = :id', ['id' => $idUser]);

    echo "<p>";
    if ($listDefis[0]->total==0){

        $houseOponent = DB::select('SELECT house_id
            FROM users
            WHERE id= :id', ['id' => $_POST['OpponentId']]);

        $houseArbiter = DB::select('SELECT house_id
            FROM users
            WHERE id= :id', ['id' => $_POST['arbiterId']]);

        if($houseArbiter[0]->house_id != $houseOponent[0]->house_id){
            DB::table('defis')->insert(
                array(
                    'challenger_id' => "$idUser",
                    'target_id' => $_POST['OpponentId'],
                    'arbiter_id' => $_POST['arbiterId'],
                    'type_id' => $_POST['defiTypeId']
                )
            );
            echo "<p>Demande de défi et d'arbitrage envoyés</p>";
        }
        else{
            echo "<p>Échec.</br> L'adversaire et l'arbitre doivent être dans des maisons différentes.</p>";
        }
    }
    else {
        echo"Vous avez déja un défi en attente de reponse. Annulez-le ou finissez-le avant de défier d'autres personnes.";
    }
    echo "</p>";
}
?>

<?php
    echo '<h2>Demandes en attente :</h2>';

    echo '<h3>Propositions de défis</h3>';
echo "<p>Vous pouvez accepter ou non une proposition de défi.</p>";


    $challengesInvitation = DB::select('SELECT type_points.name AS type, creator.first_name as cName, arbiter.first_name AS aName, defis.id AS idDefi
                FROM defis
                LEFT JOIN users AS creator
                    ON creator.id = defis.challenger_id
                LEFT JOIN users AS arbiter
                    ON arbiter.id = arbiter_id
                LEFT JOIN type_points
                    ON type_points.id = type_id
                WHERE target_id = :id
                    AND is_accepted IS NULL
                ', ['id' => $idUser]);

    if(isset($challengesInvitation[0])){
        echo '<form name="acceptDefi" id="AcceptDefiForm" method="post"> '.csrf_field() ;
        echo '<select required="required" name="proposedDefid" size="3">';

        foreach ($challengesInvitation as $challenge){
            echo '<option value="'.$challenge->idDefi.'">'.$challenge->type.' | Vous VS '.$challenge->cName.' | Arbitre : '.$challenge->aName.'</option>';
        };
        echo '</select>
            <br><input type="radio" name="acceptDefi" id=acceptDefi checked="checked"> <label for="acceptDefi">Accepter</label>
            <br><input type="radio" name="acceptDefi" id="deniedDefi"> <label for="deniedDefi">Refuser</label>
            <br><input type="submit" value="valider">

            </form>';
    }
    else {
        echo "Aucune proposition de défis en attente.";
    }



echo "<h3>Demandes d'arbitrage</h3>";
echo "<p>Vous pouvez accepter ou non une demande d'arbitrage.</p>";

    $arbitorInvitation = DB::select('SELECT type_points.name AS type, creator.first_name as cName, opponent.first_name AS oName, defis.id AS idDefi
                FROM defis
                LEFT JOIN users AS creator
                    ON creator.id = defis.challenger_id
                LEFT JOIN users AS opponent
                    ON opponent.id = target_id
                LEFT JOIN type_points
                    ON type_points.id = type_id
                WHERE arbiter_id = :id
                    AND is_accepted =True
                ', ['id' => $idUser]);

    if (isset($arbitorInvitation[0])){
        echo '<form name="acceptArbiform" id="acceptArbiform" method="post"> '.csrf_field() ;
        echo '<select required="required" name="proposedArbi" size="3">';

        foreach ($arbitorInvitation as $challenge){
            echo '<option value="'.$challenge->idDefi.'">'.$challenge->type.' | '.$challenge->oName.' VS '.$challenge->cName.' | Arbitre : Vous </option>';
        };
        echo '</select>
            <br><input type="radio" name="acceptArbiRadio" id=acceptArbi checked="checked"> <label for="acceptArbi">Accepter</label>
            <br><input type="radio" name="acceptArbiRadio" id="deniedArbi"> <label for="deniedArbi">Refuser</label>
            <br><input type="submit" value="valider">

            </form>';
    }
    else {
        echo "Aucune demande d'arbitrage en attente.";
    }



echo "<h3>Demandes envoyées</h3>";

echo "<p>Vous pouvez annuler une ancienne demande de défi pour en lancer une nouvelle.</p>";

$createdDefis = DB::select('SELECT type_points.name AS type, arbitor.first_name as aName, opponent.first_name AS oName, defis.id AS idDefi
                FROM defis
                LEFT JOIN users AS arbitor
                    ON arbitor.id = defis.arbiter_id
                LEFT JOIN users AS opponent
                    ON opponent.id = target_id
                LEFT JOIN type_points
                    ON type_points.id = type_id
                WHERE challenger_id = :id
                ', ['id' => $idUser]);

if(isset($createdDefis[0])){
    echo '<form name="DeleteDdefi" id="DeleteDdefi" method="post"> '.csrf_field() ;
    echo '<select required="required" name="CreateDdefi" size="3">';

    foreach ($createdDefis as $challenge){

        echo '<option value="'.$challenge->idDefi.'">'.$challenge->type.' | Vous VS '.$challenge->oName.' | Arbitre : '.$challenge->aName.'</option>';
        echo '</select>
            <br><input type="submit" value="Annuler">

            </form>';
    }
}
else {
    echo "Ancun défi en attente.";
}



?>

@include('footer')

</body>
