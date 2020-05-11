<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/rules.scss"/>
</head>

<body class="rules">

@include("header")

<section id="rules" class="rules">
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <h1>Coding Houses, c'est quoi ? </h1>
    <img id="logo_rules" src="img/logo.png" alt="logo">
    <p class="rules">
    Coding Houses, c'est un système de maisons à la Harry Potter mettant en compétition les élèves et permettant 
    à chacun de s'amuser dans la bienveillance.
        </br>
        Les élèves seront placés dans une des trois maisons (Gitsune, Crack'end et PhoeniXML) 
        au début de l'année scolaire, qui ont chacune leurs valeurs et leurs symboles. 
        Chaque élève à la possibilité de gagner des points pour sa maison de différentes manières : 
        </br>- En participant aux diverses activités au sein de la Coding (Coding Dojo, Coding battle...)
        </br>- En remportant des défis (chifoumi, Smash bros...)
        </br>- En participant aux tournois organisés dans l'année (Tournoi Smash...)
        </br>- Par les PO et en fonction de certaines notes
        </br>- En récompense de services rendus (portes ouvertes, organisation d'un événement, conférences...)
        </br> </br>
        Les élèves pourront aussi perdre quelques points : 
        </br>- En faisant sonner la clochette pour rien (quand on en aura une de nouveau, RIP Cergy)

        </br> </br> À la fin de l'année scolaire, un goûter sera organisé par les maisons perdantes.
        <!--J'sais pas quoi mettre :'(-->

    </p>
</section>

@include("footer")

</body>

</html>
