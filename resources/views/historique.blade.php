<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/historique.scss"/>

    <!-- <link rel="stylesheet" href="../sass/app.css"/>
    <link rel="stylesheet" href="../sass/pages/home.css"/>-->

</head>

<body>

@include('header')

<section id="rankings">
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
</section>

<section>

    <div class="stat">

        <h1>statistiques</h1>
        <div id="imgH">
        <img id="H" src="img/logo.png" alt="image de la maison">
        </div>
        <label>
            <select>
                <option>tout le joueur</option>
                <option>gitsune</option>
                <option>crackend</option>
                <option>phoenixml</option>
            </select>
        </label>
    </div>
    <section id=history>
        <p>
            <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> [jour/heure] Alyssia : +100 [Parceque j'ai décidé]
            <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> [jour/heure] Marion : +100 [C'est une déesse]
            <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> [jour/heure] Hugo : -10 [Aime pas les kinders]
            <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> [jour/heure] Houssam : -1 [Animations abusives]
            <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> [jour/heure] Emerick : -34 [Outrage à Frozen]
            <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> [jour/heure] Gwenael : +6 [Notes]
            <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> [jour/heure] Maxence : +5 [Notes]
            <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> [jour/heure] Jonathan : +30 [Défis : PFC]
            <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> [jour/heure] Juan : -20 [Outrage à la coiffure]
            <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> [jour/heure] Dylan : -5 [Abandon de la Coding]
        </p>
        <p>
            <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> [jour/heure] Marie : +5 [Défis]
            <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> [jour/heure] Marine : +30 [Event]
            <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> [jour/heure] Corentin +9 [Défis : Smash]
            <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> [jour/heure] Brian : +20 [Defis : Smash]
            <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> [jour/heure] Anthony : +7 [Notes]
            <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> [jour/heure] Corentin : -1 [Clochette]
            <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> [jour/heure] Eddy : +5 [Défis : Bottle Flip]
            <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> [jour/heure] Roman : +10 [Défis : Rubik's Cube]
            <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> [jour/heure] blibli : +4 [PO]
            <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> [jour/heure] blublu : +1 [Défis]
        </p>
    </section>

</section>


@include('footer')

</body>

</html>
