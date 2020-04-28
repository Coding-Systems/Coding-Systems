<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    <link id="cssTheme" rel="stylesheet" href="css/themes/default.css" title="defaultStyle"/>
    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/home.scss"/>

    <!-- <link rel="stylesheet" href="../sass/app.css"/>
    <link rel="stylesheet" href="../sass/pages/home.css"/>-->

</head>

<body>

@include('header')

<section id="rankings">
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>

    <section id="generalRanking">

        <h2>Classement général</h2>

        <section id=logoHousesPodium>

            <section>
                <img class="logoPodium" src="img/logoGitsune.png" alt="logo de la maison">
                <p>2</p>
            </section>
            <section>
                <img class="logoPodiumFirst" src="img/logoPhoenixml.png" alt="logo de la maison">
                <p>1</p>
            </section>
            <section>
                <img class="logoPodium" src="img/logoCrackend.png" alt="logo de la maison">
                <p>3</p>
            </section>

        </section>

    </section>
    <section>

        <h2>Historique des derniers points</h2>

        <section id=history>
            <p>
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison">[jour/heure] Alyssia : +50
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> [jour/heure] blublu : +8
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> [jour/heure]. blibli : -1
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> [jour/heure] blublu : +6
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> [jour/heure] blibli : +34
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> [jour/heure] blublu : +6
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> [jour/heure] blibli : +5
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> [jour/heure] blublu : +12
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> [jour/heure] blibli : +6
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> [jour/heure] blublu : +6
            </p>
            <p>
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> [jour/heure] blibli : +5
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> [jour/heure] blublu : +34
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> [jour/heure] blibli +9
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> [jour/heure] blublu : -4
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> [jour/heure] blibli : +7
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> [jour/heure] blublu : -1
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> [jour/heure] blibli : +5
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> [jour/heure] blublu : +20
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> [jour/heure] blibli : +4
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> [jour/heure] blublu : +1
            </p>
        </section>

    </section>
</section>

@include('footer')

</body>

</html>
