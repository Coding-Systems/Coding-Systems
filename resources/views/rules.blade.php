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
    <p class="rules">
        Coding Houses est un projet communautaire d’implantation de maisons à la Harry Potter dans le cadre de
        la Coding Factory.
        </br>Le principe serait de développer l’univers aussi bien technique que social et événementiel, avec
        l’accord et idéalement la participation de l’école.

        Seront placés dans trois maisons les élèves, selon un process à déterminer, qui auront chacune leurs
        valeurs et symboles. Un système de points de maisons déterminé créera une ambiance ludique et
        compétitive. Les points pourraient être attribués:
        </br>-Par les PO (à développer)
        </br>-De manière pré-déterminé sur des activités diverses (coding dojo, coding battle…) (plus
        d’exemples)
        </br>
        </br> -En récompense de services rendus (portes ouvertes, organisation d’un évènement, conférences…)
        </br>-En fonctions de notes? (à discuter avec les responsables pédago)

        </br> À la fin d’une année scolaire, une remise de prix/gage pour les perdants (Goûter) pour les
        maisons
        pourra être mit en place afin de récompenser les maisons et meilleurs participants.

    </p>
</section>

@include("footer")

</body>

</html>
