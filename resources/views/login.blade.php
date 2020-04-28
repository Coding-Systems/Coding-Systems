<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    <link id="cssTheme" rel="stylesheet" href="css/themes/default.css" title="defaultStyle"/>
    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/login.scss"/>
    <!--<?php
$numero = rand(0, 3);// un numero aléatoire de 0 à 3
?>
    <link rel="stylesheet" href="css/<?php echo $numero;?>.css)"/>-->
</head>

<body class="login">

@include("header")

<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>

<form class="login">
    <section class="login">
    <label class="email">E-mail
        <input type="text"/>
    </label> </br>
    <label class="password">Mot de passe
        <input type="password"/>
    </label> </br>
    <button><span>Valider</span></button>
    <button><span>MDP oublié</span></button>
    </section>
</form>

@include("footer")

</body>

</html>
