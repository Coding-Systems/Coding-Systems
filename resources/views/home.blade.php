<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    <link id="cssTheme" rel="stylesheet" href="css/themes/default.css" title="defaultStyle"/>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/default.css') }}" />

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

        <h2>Classement solo</h2>

        <section id=rankingNamesUsers>
            <p>
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> 1. Alyssia
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> 2. blublu
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> 3. blibli
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> 4. blublu
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> 5. blibli
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> 6. blublu
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> 7. blibli
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> 8. blublu
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> 9. blibli
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> 10. blublu
            </p>
            <p>
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> 11. blibli
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> 12. blublu
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> 13. blibli
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> 14. blublu
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> 15. blibli
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> 16. blublu
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> 17. blibli
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> 18. blublu
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> 19. blibli
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> 20. blublu
            </p>
        </section>

    </section>
</section>

@include('footer')

</body>

</html>
