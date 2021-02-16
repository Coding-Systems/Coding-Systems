<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/all.css"/>
    <link href="resources/js/app.js">
</head>

<body class="rules">

@include("header")

<?php

    echo 'Start <br>';
    foreach ($data['orininalList'] as $user){
        echo "P: ".$user['s_phoenixml']."; C: ".$user['s_crackend']."; G: ".$user['s_gitsune']."<br>";
    }

    echo '<br>PhoeniXML<br>';
    foreach ($data['listp'] as $user){
        echo "P: ".$user['s_phoenixml']."; C: ".$user['s_crackend']."; G: ".$user['s_gitsune']."<br>";
        }

    echo '<br>Crackend<br>';
    foreach ($data['listc'] as $user){
        echo "P: ".$user['s_phoenixml']."; C: ".$user['s_crackend']."; G: ".$user['s_gitsune']."<br>";
            }

    echo '<br>Gitsune<br>';
    foreach ($data['listg'] as $user){
        echo "P: ".$user['s_phoenixml']."; C: ".$user['s_crackend']."; G: ".$user['s_gitsune']."<br>";
        }

    echo '<br>Unplaced<br>';
    foreach ($data['listu'] as $user){
        echo "P: ".$user['s_phoenixml']."; C: ".$user['s_crackend']."; G: ".$user['s_gitsune']."<br>";
    }

?>

@include("footer")

</body>

</html>
