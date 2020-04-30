<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/quizz.scss"/>
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

    <section id="quizzPage">

        <h1>Quiz de répartition</h1>

        <p>Répondez à ce quiz pour être répartit dans la maison vous correspondant le mieux.
            <br>Ou laissez le hasard total opérer en appuyant <button>ICI</button>
        </p>

        <form id="quizzForm">

            <h2>Question 1</h2>
            <p>À quel élément tu t'identifie le plus ?</p>
            <label for="Q1A1">L'eau</label>
            <input type="radio" name="question1" id="Q1A1">
            <label for="Q1A2">La terre</label>
            <input type="radio" name="question1" id="Q1A2">
            <label for="Q1A3">Le feu</label>
            <input type="radio" name="question1" id="Q1A3">
            <label for="Q1A4">L'air</label>
            <input type="radio" name="question1" id="Q1A4">

            <h2>Question 2</h2>
            <p>BLABBALBALABLABLABLABALA ?</p>
            <label for="Q2A1">BLA</label>
            <input type="radio" name="question2" id="Q2A1">
            <label for="Q2A2">BLA</label>
            <input type="radio" name="question2" id="Q2A2">
            <label for="Q2A3">BLA</label>
            <input type="radio" name="question2" id="Q2A3">
            <label for="Q2A4">BLA</label>
            <input type="radio" name="question2" id="Q2A4">

            <h2>Question X</h2>
            <p>BLABBALBALABLABLABLABALA ?</p>
            <label for="QXA1">BLA</label>
            <input type="radio" name="questionX" id="QXA1">
            <label for="QXA2">BLA</label>
            <input type="radio" name="questionX" id="QXA2">
            <label for="QXA3">BLA</label>
            <input type="radio" name="questionX" id="QXA3">
            <label for="QXA4">BLA</label>
            <input type="radio" name="questionX" id="QXA4">

        </form>
    </section>


@include("footer")

</body>

</html>
