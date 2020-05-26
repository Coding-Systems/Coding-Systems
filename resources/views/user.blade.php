<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/user.scss"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

</head>

<body class="rules">

@include("header")

<section>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>

    <div id="user">

        <h1>Nom Prénom User</h1>

        <div id="statsUser">
            <img id="logoUser" src="img/logo.png" alt="logo"> <!--Logo évolutif chez les étudiants -->

            <div>
                <p id="stats">
                    <h2>Statistiques</h2>
                    Total de points :
                    <br>Défis lancés :
                    <br>Défis gagnés :
                    <br>Classement général :
                    <br>Classement maison :
                    <br>
                    <br>Points donnés :
                    <br>Event organisés :
                    <br>
                </p>
            </div>

            <div id="cssThemeSwitcher">

                <h2>Thème</h2>

                <button id="defaultTheme" class="cssTheme"
                        onclick='document.cookie = "themeCookie=default"; path="/";
                document.getElementById("cssTheme").href="css/themes/default.css";
                ;'>Thème Coding Houses
                </button>
                <button id="crackendTheme" class="cssTheme"
                        onclick='document.cookie = "themeCookie=crackend"; path="/";
                document.getElementById("cssTheme").href="css/themes/crackend.css";
                ;'>Thème Crack'end
                </button>
                <button id="phoenixmlTheme" class="cssTheme"
                        onclick='document.cookie = "themeCookie=phoenixml"; path="/";
                document.getElementById("cssTheme").href="css/themes/phoenixml.css";
                ;'>Thème PhoeniXML
                </button>
                <button id="gistuneTheme" class="cssTheme"
                        onclick='document.cookie = "themeCookie=gitsune"; path="/";
                document.getElementById("cssTheme").href="css/themes/gitsune.css";

                ;')>Thème Gitsune
                </button>

            </div>

        </div>
        <div id="hirtoryUser">
            <h2>Historique</h2>

            <form class="HistoryForm">
                <select>
                    <option>Tout</option>
                    <option>Défis</option>
                    <option>Notes</option>
                </select>
                <button>Valider</button>
            </form>

            <section id="history">
                <p>
                    <?php
                        use Illuminate\Support\Facades\DB;

                        $mvt_point = DB::table('mvt_points') -> get();
                        foreach ($mvt_point as $mvt_points){
                            echo '-'.$mvt_points->users_id.':'.$mvt_points->label.' ';
                        }
                    ?>
                </p>
            </section>

            <section>
                <div style="z-index: 999999" class="mypanel"></div>
            </section>



        </div>


    </div>




</section>

@include("footer")

</body>

</html>
