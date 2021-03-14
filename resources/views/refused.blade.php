<!DOCTYPE html>
<html lang="fr">

<?php
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
?>

<head>
    <meta charset="UTF-8">
    <title>Coding system</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    <link href="resources/js/app.js">

    @include('cssSwitcher')

    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/all.css"/>

</head>

<body>

@include('header')

<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>

<section>

    <h1>Connection refusée</h1>

    <p>Votre compte n'existe pas</p>

    <a href="/">Retour à l'accueil</a>

</section>

@include('footer')

</body>

</html>