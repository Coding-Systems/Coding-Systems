<!DOCTYPE html>
<html lang="fr">
<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
$idUser = 3;
?>

<head>
    <meta charset="UTF-8">
    <title>Coding system</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/all.css"/>
    <link rel="stylesheet" href="css/pages/quizz.scss"/>
    <link rel="stylesheet" href="css/pages/quizzradio.css"/>
    <link rel="stylesheet" href="css/pages/quizzsass.css"/>
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

        <p class="quizzPage">Répondez à ce quiz pour être répartit dans la system vous correspondant le mieux.
            <br>Ou laissez le hasard total opérer en appuyant

    <form id="quizzForm" name="skipQuizzForm" method="post">
        {{ csrf_field() }}

        <input type="submit" value="ICI" name="validSkip" id="validSkip">

    </form>
    <br>
    <br><p>Si vous rencontrez des réponses troll, c'est qu'ils s'agit de réponses neutres, mais en un peu plus fun :P.
    </p>

        <form id="quizzForm" name="quizzForm" method="post"> <!-- PENSER A CHANGER L'ORDRE DE CERTAINES !!!!! -->
        {{ csrf_field() }} <!-- 2, 5, 10, 20-->
            @foreach ($data as $question)

                <h2>Question {{$loop->iteration}}</h2>
                <p class="quizzPage">{{$question['questionText']}}</p>
                @foreach($question['answers'] as $answer)

                    <div class="question container cntr">
                        <label class="radio btn-radio" for="Q{{$loop->parent->iteration}}A{{$loop->index}}">{{$answer['text']}}
                            <input class="check" type="radio" name="radio{{$loop->parent->index}}" id="Q{{$loop->parent->iteration}}A{{$loop->index}}" value="{{$loop->index}}">
                            <svg width="20px" height="20px" viewBox="0 0 20 20">
                                <circle cx="10" cy="10" r="9"></circle>
                                <path d="M10,7 C8.34314575,7 7,8.34314575 7,10 C7,11.6568542 8.34314575,13 10,13 C11.6568542,13 13,11.6568542 13,10 C13,8.34314575 11.6568542,7 10,7 Z" class="inner"></path>
                                <path d="M10,1 L10,1 L10,1 C14.9705627,1 19,5.02943725 19,10 L19,10 L19,10 C19,14.9705627 14.9705627,19 10,19 L10,19 L10,19 C5.02943725,19 1,14.9705627 1,10 L1,10 L1,10 C1,5.02943725 5.02943725,1 10,1 L10,1 Z" class="outer"></path>
                            </svg>
                        </label>

                    </div>


                @endforeach
            @endforeach
            <input type="submit" value="Envoyer" name="envoi" id="submitButton">

        </form>
    </section>

@include("footer")

</body>

</html>
