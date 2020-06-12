<!DOCTYPE html>
<html lang="fr">

<?php $idUser=7;
?>

<head>
  <meta charset="UTF-8">
  <title>Coding house</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/all.css"/>
    <link href="resources/js/app.js">

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
            AND users.statut="student"
        ORDER BY houseName, fName', ['id' => $idUser]);

    echo '<h3>Choisissez votre adversaire :</h3>';

    echo '<section class="oppenents">';
    //echo '<label class="typeDefi">Type de défi';
    echo '<select required="required" name="OpponentId" size="7">';

    foreach ($listUsers as $user){
        echo '<option value="'.$user->Uid.'">'."[".$user->houseName."] ".$user->fName." ".$user->lName.'</option>';
    }

    echo '</select>';

    echo'<h3>Choisissez votre arbitre :</h3>';

    echo '<section class="arbiter">';
    //echo '<label class="typeDefi">Type de défi';
    echo '<select required="required" name="arbiterId" size="7">';

    foreach ($listUsers as $user){
        echo '<option value="'.$user->Uid.'">'."[".$user->houseName."] ".$user->fName." ".$user->lName.'</option>';
    };

    $listpo = DB::select('SELECT first_name AS fName, last_name AS lName, users.id as Uid
        FROM users
        WHERE users.statut="PO"
        ORDER BY fName', ['id' => $idUser]);

    foreach ($listpo as $user){
        echo '<option value="'.$user->Uid.'">'."[PO] ".$user->fName." ".$user->lName.'</option>';
    }

    echo '</select>';

    echo '</br><input type="submit" value="Valider"> ';

    echo '</form>';

    }

if(isset($_POST['OpponentId']) && isset($_POST['arbiterId']) &&isset($_POST['defiTypeId'])){
    //OpponentId arbiterId defiTypeId

    $listDefis = DB::select('SELECT COUNT(id) AS total
        FROM defis
        WHERE challenger_id = :id
            AND winner_id IS NULL', ['id' => $idUser]);

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
            unset($_POST);
        }
        else{
            echo "<p>Échec.</br> L'adversaire et l'arbitre doivent être dans des maisons différentes.</p>";
        }
    }
    else {
        echo"Vous avez déja un défi en attente de réponses. Annulez-le ou finissez-le avant de défier d'autres personnes.";
    }
    echo "</p>";
    unset($_POST);
}

    echo '<h2>Demandes en attente :</h2>';

if($userType[0]->statut=='student'){

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
        echo '<select required="required" id="proposedDefi" name="proposedDefi" size="3">';

        foreach ($challengesInvitation as $challenge){
            echo '<option value="'.$challenge->idDefi.'">'.$challenge->type.' | Vous VS '.$challenge->cName.' | Arbitre : '.$challenge->aName.'</option>';
        };
        echo '</select>
            <br><input type="radio" name="actionDefi" value="acceptDefi" id=actionDefi checked="checked"> <label for="acceptDefi">Accepter</label>
            <br><input type="radio" name="actionDefi" value="deniedDefi" id="actionDefi"> <label for="deniedDefi">Refuser</label>
            <br><input type="submit" value="valider">

            </form>';
    }
    else {
        echo "Aucune proposition de défis en attente.";
    }

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
                    AND winner_id IS NULL
                    AND is_accepted =True
                ', ['id' => $idUser]);

    if (isset($arbitorInvitation[0])){
        echo '<form name="acceptArbiform" id="acceptArbiform" method="post"> '.csrf_field() ;
        echo '<select required="required" id="proposedArbi" name="proposedArbi" size="3">';

        foreach ($arbitorInvitation as $challenge){
            echo '<option value="'.$challenge->idDefi.'">'.$challenge->type.' | '.$challenge->oName.' VS '.$challenge->cName.' | Arbitre : Vous </option>';
        };
        echo '</select>
            <br><input type="radio" name="actionArbiRadio" value="acceptArbi" id=acceptArbi checked="checked"> <label for="acceptArbi">Accepter</label>
            <br><input type="radio" name="actionArbiRadio" value="deniedArbi" id="deniedArbi"> <label for="deniedArbi">Refuser</label>
            <br><input type="submit" value="valider">

            </form>';
    }
    else {
        echo "Aucune demande d'arbitrage en attente.";
    }

if($userType[0]->statut=='student'){
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
                    AND winner_id IS NULL
                ', ['id' => $idUser]);

    if(isset($createdDefis[0])){
        echo '<form name="DeleteDdefi" id="DeleteDdefi" method="post"> '.csrf_field() ;
        echo '<select required="required" id="CreateDdefi" name="CreateDdefi" size="3">';

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
}
?>

<?php
if(isset($_POST['proposedDefi'])){

    if($_POST['actionDefi']=='acceptDefi'){
        DB::table('defis')
            ->where('id', $_POST['proposedDefi'])
            ->update(array('is_accepted' => 1));
    }
    else {
        DB::table('defis')->where('id', $_POST['proposedDefi'])->delete();
    }
    unset($_POST);
}

if(isset($_POST['proposedArbi'])){

    if($_POST['actionArbiRadio']=='acceptArbi'){

        $usersInfos = DB::select('SELECT challenger.id as cid, challenger.first_name AS cfirst, challenger.last_name AS clast, target.id as tid, target.first_name AS tfirst, target.last_name AS tlast
            FROM defis
            LEFT JOIN users as challenger
                ON challenger.id = defis.challenger_id
            LEFT JOIN users as target
                ON target.id = defis.target_id
            WHERE defis.id = :id
    ', ['id' => $_POST['proposedArbi']]);

        $match = $usersInfos[0];

        echo "<h3>Zone d'arbitrage</h3>".
            "<p>Sélectionnez le gagnant</p>".
            '<form name="winnerForm" id="winnerForm" method="post">'.csrf_field().'
            <br><input type="radio" name="winnerRadio" value="'.$_POST['proposedArbi']."_".$match->cid.'" id="challengerWin"><label for="challengerWin">'.$match->cfirst." ".$match->clast.'</label>
            <br><input type="radio" name="winnerRadio" value="'.$_POST['proposedArbi']."_".$match->tid.'" id="targetWin"><label for="targetWin">'.$match->tfirst." ".$match->tlast.'</label>
            <br><input type="submit" value="valider">
';
    }
    else {
        DB::table('defis')->where('id', $_POST['proposedArbi'])->delete();
    }
    unset($_POST);
}

    if(isset($_POST['winnerRadio'])){

        $winner = explode("_",$_POST['winnerRadio']);
        $idDefi = $winner[0];
        $idWinner= $winner[1];

        DB::table('defis')
            ->where('id', $idDefi)
            ->update(array('winner_id' => $idWinner));

        $addMvtpts = DB::select('SELECT type_points.default_pts AS pts, type_points.id AS typeId , defis.id as defiID, defis.winner_id as winnerId
            FROM defis
            LEFT JOIN type_points
                ON type_points.id =defis.type_id
            WHERE defis.id= :id    ', ['id' => $idDefi]);

        $infosPts=$addMvtpts[0];

        date_default_timezone_set('Europe/Paris');
        $date = date("Y-m-d H:i:s");


        DB::table('mvt_points')->insert(
            array(
                'label' => "$infosPts->pts",
                'users_id' => "$infosPts->winnerId",
                'type_point_id' => "$infosPts->typeId",
                'created_at' => "$date",
            )
        );

        DB::table('users')
            ->where('id', $infosPts->winnerId)
            ->increment('total_pts_defi', $infosPts->pts);

        DB::table('users')
            ->where('id', $infosPts->winnerId)
            ->increment('total_pts', $infosPts->pts);

        DB::table('users')
            ->where('id', $infosPts->winnerId)
            ->increment('total_won_defis', 1);

        unset($_POST);
    }

    ?>

@include('footer')

</body>
