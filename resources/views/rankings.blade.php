<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/rankings.scss"/>

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

        <h1>Classement</h1>

        <form class="triHouseRankForm">
            <select>
                <option>Nombre de points gagnés avec les défis</option>
                <option>Nombre de points gagnés avec les challenges</option>
                <option>Nombre de défis gagnés</option>
                <option>Nombre de challenges gagnés</option>
            </select>
            <button>Valider</button>
        </form>

        <h2>Classement général</h2>

        <section id=logoHousesPodium>

            <section>
                <img class="logoPodium" src="img/logoGitsune.png" alt="logo de la maison">
                <p class="numberRanking">2</p>
                <p>486 pts</p>
            </section>
            <section>
                <img class="logoPodiumFirst" src="img/logoPhoenixml.png" alt="logo de la maison">
                <p class="numberRanking">1</p>
                <p>587 pts</p>
            </section>
            <section>
                <img class="logoPodium" src="img/logoCrackend.png" alt="logo de la maison">
                <p class="numberRanking">3</p>
                <p>284 pts</p>
            </section>

        </section>

    </section>
    <section>

        <h2>Classement solo</h2>

        <section id=rankingNamesUsers>
            <p>
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> 1. Alyssia : 67 pts
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> 2. blublu : 65 pts
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> 3. blibli : 54 pts
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> 4. blublu : 53 pts
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> 5. blibli : 45 pts
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> 6. blublu : 45 pts
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> 7. blibli : 41 pts
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> 8. blublu : 39 pts
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> 9. blibli : 37 pts
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> 10. blublu : 34 pts
            </p>
            <p>
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> 11. blibli : 30 pts
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> 12. blublu pts : 29 pts
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> 13. blibli : 24 pts
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> 14. blublu : 23 pts
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> 15. blibli : 21 pts
                <br/> <img class="houseIcon" src="img/logoGitsune.png" alt="logo de la maison"> 16. blublu : 20 pts
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> 17. blibli : 18 pts
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> 18. blublu : 16 pts
                <br/> <img class="houseIcon" src="img/logoPhoenixml.png" alt="logo de la maison"> 19. blibli : 17 pts
                <br/> <img class="houseIcon" src="img/logoCrackend.png" alt="logo de la maison"> 20. blublu : 6 pts
            </p>
        </section>

    </section>
</section>

@include('footer')

</body>

</html>
