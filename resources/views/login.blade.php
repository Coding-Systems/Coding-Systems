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
        <input type="submit" value="validé" name="submit"/>
        <button><span>MDP oublié</span></button>

        <div><h1>
                <?php
                // Vérifier si le formulaire est soumis
                if (isset($_GET['submit'])) {


                    $email = $_GET['setemail'];
                    $mdp = $_GET['setmdp'];

                    try {
                        $bdd = new PDO('mysql:host=localhost:8889;dbname=coding_house;charset=utf8', 'root', 'coding');
                        $results = DB::select('SELECT * FROM `users` where `mail`=' . '"' . $email . '"' . 'and `password`=' . '"' . $mdp . '"' . ';');
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    foreach ($results as $users) {
                        echo $email;
                        $idu = $users->id;
                        echo '<p>' . $idu . ".</p><br/>";
                    }
                    //$req = DB::select('SELECT * FROM `users` where mail='.$email);

                }
                ?></h1></div>

        <a href="loginregister.blade.php"><span>crée un compte</span></a>

        <br><a class="menuLink" href="/quizz">Quizz</a> <!-- Lien temporaire !!! -->

    </section>

</form>

@include("footer")

</body>

</html>
