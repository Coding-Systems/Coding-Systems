<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
    <title>Coding system</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    <link href="resources/js/app.js">

    @include('cssSwitcher')

    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/all.css"/>
    <link rel="stylesheet" href="css/pages/404.css"/>

</head>

<body>

@include("header")
<section>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
<div class="404_div">

    <h1 class="center">Tu t'es perdu ?</h1>
    <img id="logo_servbere" class="rules" src="img/servbere.png" alt="logo">
    <p class="center">La chambre des secrets c'est pas ici !</p>

</div>
</section>

<a class="linkError" href="/">Revenir à l'accueil</a>

</body>

@include("footer")

</html>
