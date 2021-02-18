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

        <h1>Quizz de répartition</h1>

        <img id="logo_servbere" class="rules" src="img/servbere.png" alt="logo">

        <p class="quizzPage">Répondez à ce quiz pour être répartit dans la maison vous correspondant le mieux.
            <br>Ou laissez le hasard total opérer en appuyant

        <form id="quizzForm" name="skipQuizzForm" method="post">
            {{ csrf_field() }}

            <input type="submit" value="ICI" name="validSkip" id="validSkip">

        </form>
            <br>
        </p>

        <form id="quizzForm" name="quizzForm" method="post"> <!-- PENSER A CHANGER L'ORDRE DE CERTAINES !!!!! -->
        {{ csrf_field() }} <!-- 2, 5, 10, 20-->
            @foreach ($data as $question)

                <h2>Question {{$loop->iteration}}</h2>
                <p class="quizzPage">{{$question['questionText']}}</p>
                @foreach($question['answers'] as $answer)

                    <input type="radio" name="radio{{$loop->parent->index}}" id="Q{{$loop->parent->iteration}}A{{$loop->index}}" value="{{$loop->index}}">
                    <label for="Q{{$loop->parent->iteration}}A{{$loop->index}}">{{$answer['text']}}</label>

                @endforeach
            @endforeach
            <br>
            <br>
            <input type="submit" value="Envoyer" name="envoi" id="submitButton">

        </form>
    </section>

@include("footer")

</body>

</html>
