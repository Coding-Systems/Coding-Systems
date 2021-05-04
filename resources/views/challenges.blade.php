<!DOCTYPE html>
<html lang="fr">

<?php use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
?>

<head>
  <meta charset="UTF-8">
  <title>Coding system</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/all.css"/>
    <link rel="stylesheet" href="css/pages/challenges.scss"/>
    <link rel="stylesheet" href="/public/css/pages/challenges.scss"/>
    <link href="resources/js/app.js">

</head>

<body>

@include('header')

<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>

<h1>Défis</h1>

<?php

$userType = Auth::user();
if($userType->statut == 'student'){

    echo '<h2>Lancer un défi</h2>';
    echo "<p class='challengePage'>L'adversaire et l'arbitre doivent être de systems différentes !</p>";

    echo "<div id='sendChallenge'>";

    echo "<div id='chooseChallenge' class='challengeSelect'>";

    echo '<form name="newDefiForm" id="newDefiForm" method="post"> '.csrf_field() ; //echo '{{ csrf_field() }}';

    echo '<h3 class="challengePage">Type du défis :</h3>';

    echo '<section class="addPoints">';
    //echo '<label class="typeDefi">Type de défi';

    // echo '<input required="required" name="defiTypeId"/>';

    echo '<input id="challengeInput"  name="searchChallenge" type="searchChallenge" autofocus>';

    echo '<p id="notFound" class="disabled">Oups. Ce que tu cherches n\'existe pas...</p>';

    echo '<select required="required" id="selectChallenge" name="defiTypeId" size="7">';

    $listDefis = DB::table('defis_type')->select("id", "label")->get();

    echo '<script>
const searchBarChallenge = document.getElementById("challengeInput");
searchBarChallenge.addEventListener("keyup", e => {
    const searchString = e.target.value;
    let input = document.getElementById("challengeInput").value;
    input = input.toLowerCase();
    var selectElmt = document.getElementById("selectChallenge").options;

    j = 0
    for (i = 0; i < selectElmt.length; i++) {
        var optionselm = selectElmt[i].id;
        if (!optionselm.toLowerCase().includes(searchString)) {
            document.getElementById(optionselm).classList.add("disabled");
            j++

            if (j >= selectElmt.length){
                document.getElementById("selectChallenge").classList.add("disabled");
                document.getElementById("notFound").classList.remove("disabled");
            }
        }
        else {
            document.getElementById(optionselm).classList.remove("disabled");
            document.getElementById("selectChallenge").classList.remove("disabled");
            document.getElementById("notFound").classList.add("disabled");
        }
    }
})
</script>';

    foreach ($listDefis as $defi){
        echo '<option id="'.$defi->label.'"value="'.$defi->id.'">'.$defi->label.'</option>';
    };
    echo '</select>';

    echo "</div>";

    echo "<div id='chooseOpponent' class='challengeSelect'>";

    $listUsers = DB::select('SELECT first_name AS fName, last_name AS lName, users.id as Uid, systems.name AS systemName
        FROM users
        LEFT JOIN systems
        	ON systems.id = users.system_id
        WHERE system_id != (SELECT system_id
                            	FROM users AS usersOne
                            	WHERE usersOne.id = :id)
            AND users.statut="student"
        ORDER BY systemName, fName', ['id' => $userType->id]);
    echo '<h3 class="challengePage">Votre adversaire :</h3>';

    echo '<section class="oppenents">';
    //echo '<label class="typeDefi">Type de défi';

    echo '<input id="opponentInput"  name="searchOpponent" type="searchOpponent">';

    echo '<p id="notFoundOpponent" class="disabled">Oups. Ce que tu cherches n\'existe pas...</p>';

    echo '<select required="required" id="selectOpponent" name="OpponentId" size="7">';

        foreach ($listUsers as $user){
        echo '<option id="'.$user->fName.$user->lName.'" value="'.$user->Uid.'" class="option_'.$user->systemName.'">'."[".$user->systemName."] ".$user->fName." ".$user->lName.'</option>';
    }

        echo '<script>
    const searchBarOpponent = document.getElementById("opponentInput");
    searchBarOpponent.addEventListener("keyup", e => {
    const searchString = e.target.value;
    let input = document.getElementById("opponentInput").value;
    input = input.toLowerCase();
    var selectElmtOpponent = document.getElementById("selectOpponent").options;
    j = 0

    for (i = 0; i < selectElmtOpponent.length; i++) {
        var optionselmOpponent = selectElmtOpponent[i].text;
        var optionidOpponent = selectElmtOpponent[i].id;
        console.log(optionselmOpponent);
        if (!optionselmOpponent.toLowerCase().includes(searchString)) {
            document.getElementById(optionidOpponent).classList.add("disabled");
            j++

            if (j >= selectElmtOpponent.length){
                document.getElementById("selectOpponent").classList.add("disabled");
                document.getElementById("notFoundOpponent").classList.remove("disabled");
            }
        }
        else {
            document.getElementById(optionidOpponent).classList.remove("disabled");
            document.getElementById("selectOpponent").classList.remove("disabled");
            document.getElementById("notFoundOpponent").classList.add("disabled");
        }
    }
})
</script>';

    echo '</select>';

    echo "</div>";

    echo "<div id='chooseArbiter' class='challengeSelect'>";

    echo'<h3 class="challengePage">Votre arbitre :</h3>';

    echo '<section class="arbiter">';
    //echo '<label class="typeDefi">Type de défi';

    echo '<input id="arbiterInput" name="searchArbiter" type="searchArbiter">';

    echo '<p id="notFoundArbiter" class="disabled">Oups. Ce que tu cherches n\'existe pas...</p>';

    echo '<select required="required" id="selectArbiter" name="arbiterId" size="7">';

    foreach ($listUsers as $user){
        echo '<option id="'.$user->lName.$user->fName.'" value="'.$user->Uid.'" class="option_'.$user->systemName.'">'."[".$user->systemName."] ".$user->fName." ".$user->lName.'</option>';
    };

    $listpo = DB::select('SELECT first_name AS fName, last_name AS lName, users.id as Uid
        FROM users
        WHERE users.statut="PO"
        ORDER BY fName', ['id' => $userType->id]);

    foreach ($listpo as $user){
        echo '<option id="'.$user->lName.$user->fName.'" value="'.$user->Uid.'">'."[PO] ".$user->fName." ".$user->lName.'</option>';
    }

    echo '<script>
    const searchBarArbiter = document.getElementById("arbiterInput");
    searchBarArbiter.addEventListener("keyup", e => {
    const searchString = e.target.value;
    let input = document.getElementById("arbiterInput").value;
    input = input.toLowerCase();
    var selectElmtArbiter = document.getElementById("selectArbiter");
    j = 0

    for (i = 0; i < selectElmtArbiter.length; i++) {
        var optionselmArbiter = selectElmtArbiter[i].text;
        var optionidArbiter = selectElmtArbiter[i].id;
        if (!optionselmArbiter.toLowerCase().includes(searchString)) {
            document.getElementById(optionidArbiter).classList.add("disabled");

            j++

            if (j >= selectElmtArbiter.length){
                document.getElementById("selectArbiter").classList.add("disabled");
                document.getElementById("notFoundArbiter").classList.remove("disabled");
            }
        }
        else {
            document.getElementById(optionidArbiter).classList.remove("disabled");
            document.getElementById("selectArbiter").classList.remove("disabled");
            document.getElementById("notFoundArbiter").classList.add("disabled");
        }
    }
})
</script>';

    echo '</select>';

    echo "</div>";
        echo "</div>";


    echo '</br><input class="sumbmitchallanges" type="submit" value="Valider"> ';

    echo '</form>';

}

if(isset($_POST['OpponentId']) && isset($_POST['arbiterId']) &&isset($_POST['defiTypeId'])){
    //OpponentId arbiterId defiTypeId

    $listDefis = DB::select('SELECT COUNT(id) AS total
        FROM defis
        WHERE challenger_id = :id
            AND winner_id IS NULL', ['id' => $userType->id]);

    echo "<p>";
    if ($listDefis[0]->total==0){

        $systemOponent = DB::select('SELECT system_id
            FROM users
            WHERE id= :id', ['id' => $_POST['OpponentId']]);

        $systemArbiter = DB::select('SELECT system_id
            FROM users
            WHERE id= :id', ['id' => $_POST['arbiterId']]);

        if($systemArbiter[0]->system_id != $systemOponent[0]->system_id){
            DB::table('defis')->insert(
                array(
                    'challenger_id' => "$userType->id",
                    'target_id' => $_POST['OpponentId'],
                    'arbiter_id' => $_POST['arbiterId'],
                    'type_id' => $_POST['defiTypeId']
                )
            );
            echo "<p class='challengePage'>Demande de défi et d'arbitrage envoyés</p>";
            unset($_POST);
        }
        else{
            echo "<p class='challengePage'>Échec.</br> L'adversaire et l'arbitre doivent être dans des systems différentes.</p>";
        }
    }
    else {
        echo"Vous avez déja un défi en attente de réponses. Annulez-le ou finissez-le avant de défier d'autres personnes.";
    }
    echo "</p>";
    unset($_POST);
}

    echo '<h2>Demandes en attente :</h2>';

if($userType->statut=='student'){

    echo "<div id='requestChallenges'>";

    echo "<div id='receiveChallenge' class='manageRequests'>";

    echo '<h3 class="challengePage">Propositions de défis</h3>';
    echo "<p class='challengePage'>Vous pouvez accepter ou non une proposition de défi.</p>";


    $challengesInvitation = DB::select('SELECT creator.first_name as cName, arbiter.first_name AS aName, defis.id AS idDefi, typeDefis.label AS defiLabel
                FROM defis
                LEFT JOIN users AS creator
                    ON creator.id = defis.challenger_id
                LEFT JOIN users AS arbiter
                    ON arbiter.id = arbiter_id
                LEFT JOIN defis_type AS typeDefis
                    ON typeDefis.id = type_id
                WHERE target_id = :id
                    AND is_accepted IS NULL
                ', ['id' => $userType->id]);

    if(isset($challengesInvitation[0])){
        echo '<form name="acceptDefi" id="AcceptDefiForm" method="post"> '.csrf_field() ;
        echo '<select required="required" id="proposedDefi" name="proposedDefi" size="3">';

        foreach ($challengesInvitation as $challenge){
            echo '<option value="'.$challenge->idDefi.'">'.$challenge->defiLabel.' | Vous VS '.$challenge->cName.' | Arbitre : '.$challenge->aName.'</option>';
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
    echo "</div>";

    echo "<div id='receiveArbiter' class='manageRequests'>";


echo "<h3 class='challengePage' >Demandes d'arbitrage</h3>";
echo "<p class='challengePage' >Vous pouvez accepter ou non une demande d'arbitrage.</p>";

    $arbitorInvitation = DB::select('SELECT creator.first_name as cName, opponent.first_name AS oName, defis.id AS idDefi, typeDefis.label AS defiLabel
                FROM defis
                LEFT JOIN users AS creator
                    ON creator.id = defis.challenger_id
                LEFT JOIN users AS opponent
                    ON opponent.id = target_id
                LEFT JOIN defis_type AS typeDefis
                    ON typeDefis.id = type_id
                WHERE arbiter_id = :id
                    AND winner_id IS NULL
                    AND is_accepted =True
                ', ['id' => $userType->id]);

    if (isset($arbitorInvitation[0])){
        echo '<form name="acceptArbiform" id="acceptArbiform" method="post"> '.csrf_field() ;
        echo '<select required="required" id="proposedArbi" name="proposedArbi" size="3">';

        foreach ($arbitorInvitation as $challenge){
            echo '<option value="'.$challenge->idDefi.'">'.$challenge->defiLabel.' | '.$challenge->oName.' VS '.$challenge->cName.' | Arbitre : Vous </option>';
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

    echo "</div>";
echo "<div id='sendRequests' class='manageRequests'>";

if($userType->statut=='student'){
    echo "<h3 class='challengePage' >Demandes envoyées</h3>";

    echo "<p class='challengePage' >Vous pouvez annuler une ancienne demande de défi pour en lancer une nouvelle.</p>";

    $createdDefis = DB::select('SELECT arbitor.first_name as aName, opponent.first_name AS oName, defis.id AS idDefi, typeDefis.label AS defiLabel
                FROM defis
                LEFT JOIN users AS arbitor
                    ON arbitor.id = defis.arbiter_id
                LEFT JOIN users AS opponent
                    ON opponent.id = target_id
                LEFT JOIN defis_type AS typeDefis
                    ON typeDefis.id = type_id
                WHERE challenger_id = :id
                    AND winner_id IS NULL
                ', ['id' => $userType->id]);

    if(isset($createdDefis[0])){
        echo '<form name="DeleteDdefi" id="DeleteDdefi" method="post"> '.csrf_field() ;
        echo '<select required="required" id="CreateDdefi" name="CreateDdefi" size="3">';

        foreach ($createdDefis as $challenge){

            echo '<option value="'.$challenge->idDefi.'">'.$challenge->defiLabel.' | Vous VS '.$challenge->oName.' | Arbitre : '.$challenge->aName.'</option>';
            echo '</select>
            <br><input type="submit" value="Annuler">

            </form>';
        }
    }
    else {
        echo "Ancun défi en attente.";
    }
}

echo "</div>";


if(isset($_POST['CreateDdefi'])){

    DB::table('defis')->where('id', $_POST['CreateDdefi'])->delete();

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

        echo "<h3 class='challengePage' >Zone d'arbitrage</h3>".
            "<p class='challengePage' >Sélectionnez le gagnant</p>".
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

        $addMvtpts = DB::select('SELECT defis.id as defiID, defis.winner_id as winnerId, label
            FROM defis
            WHERE defis.id= :id    ', ['id' => $idDefi]);

        $infosPts=$addMvtpts[0];
        $label=$infosPts->label;
        $nbrPts = (5);

        date_default_timezone_set('Europe/Paris');
        $date = date("Y-m-d H:i:s");


        DB::table('mvt_points')->insert(
            array(
                'nbr_points' => "$nbrPts",
                'users_id' => "$infosPts->winnerId",
                'created_at' => "$date",
                'label'=> "$label"
            )
        );

        DB::table('users')
            ->where('id', $infosPts->winnerId)
            ->increment('total_pts_defi', "$nbrPts");

        DB::table('users')
            ->where('id', $infosPts->winnerId)
            ->increment('total_pts', "$nbrPts");

        DB::table('users')
            ->where('id', $infosPts->winnerId)
            ->increment('total_won_defis', 1);

        $systemsIds = DB::select('SELECT system_id AS systemId
                FROM users
                WHERE id = :id
                ', ['id' => $infosPts->winnerId]);

        $idSystemWinner = $systemsIds[0];

        DB::table('systems')
            ->where('id', $idSystemWinner->systemId)
            ->increment('total_pts_defi', "$nbrPts");

        DB::table('systems')
            ->where('id', $idSystemWinner->systemId)
            ->increment('total_pts', "$nbrPts");

        unset($_POST);
    }

    ?>

@include('footer')

</body>
