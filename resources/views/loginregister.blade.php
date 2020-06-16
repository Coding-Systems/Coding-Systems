<!-- deprecated with google oauth -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/login.scss"/>
<!--<?php
use Illuminate\Support\Facades\DB;$numero = rand(0, 3);// un numero aléatoire de 0 à 3
?>
    <link rel="stylesheet" href="css/<?php echo $numero;?>.css)"/>-->
</head>

<body class="login">

@include("header")

<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>

<form class="login" method="get">
    <section class="login">
        <label class="email">E-mail
            <input type="text" name="setemail" id="email" value=""/>
        </label>
        </br>
        <label class="password">Mot de passe
            <input type="text" name="setmdp" id="mdp" value=""/>
        </label>
        </br>
        <label class="nom">nom
            <input type="text" name="setnom" id="nom" value=""/>
        </label>
        </br>
        <label class="nomdefamille">nom de famille
            <input type="text" name="setnomdefamille" id="nomdefamille" value=""/>
        </label>
        </br>
        <label class="anne">année actuel
            <input type="text" name="setannee" id="annee" value=""/>
        </label>
        </br>
        <input type="submit" value="validé" name="submit"/>
        <button><span>MDP oublié</span></button>
        <?php
        // Vérifier si le formulaire est soumis
        if (isset($_GET['submit'])) {

            $email = $_GET['setemail'];
            $mdp = $_GET['setmdp'];
            $nom = $_GET['setnom'];
            $nomdefamille = $_GET['setnomdefamille'];
            $annee = $_GET['setannee'];
            $date = "student";

            try {
                $bdd = new PDO('mysql:host=localhost:8889;dbname=coding_house;charset=utf8', 'root', 'coding');
                echo '<p>aller vous connecter</p>';
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }

            $req = $bdd->prepare('INSERT INTO `users`(`first_name`, `last_name`, `mail`, `password`, `year`, `statut`) VALUES ('.$nom.','.$nomdefamille.','.$email.','.$mdp.','.$annee.','.$date.');');

            echo 'ajouté !';
        }
        ?>
        <a href="loginregister.blade.php"><span>connecter vous</span></a>

        <br><a class="menuLink" href="/quizz">Quizz</a> <!-- Lien temporaire !!! -->

    </section>

</form>

@include("footer")

</body>

</html>
