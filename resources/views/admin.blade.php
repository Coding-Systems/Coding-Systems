<!DOCTYPE html>
<html lang="fr">
<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Providers\DistributionServiceProvider;
use App\Providers\CheckLogoLvl;
?>

<head>
    <meta charset="UTF-8">
    <title>Coding system</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/all.css"/>
    <link rel="stylesheet" href="css/pages/admin.css"/>
    <link href="resources/js/app.js">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>
@include("header")
<section id="adminSection">
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <h1>Admin</h1>
    <div class="buttonUP">
        <div id="buttonUPA">

            <H2>Lancer la répartition</H2>

            <?php
            $promoList = DB::select('SELECT id, name
            FROM promo WHERE is_distributed = false');

            //foreach ($promoList as $promo)
            ?>

            <h3>Ratio de personnes ayant répondu :</h3>

            <?php
            foreach ($promoList as $promo) {

                $usersTotal = DB::select('SELECT u.id
        FROM users AS U
        WHERE u.promo_id = :id
        ', ['id' => $promo->id]);

                $usersDone = DB::select('SELECT u.id
        FROM users AS U
        LEFT JOIN result_test as RT
        	ON U.id = RT.users_id
        WHERE u.promo_id = :id
        AND RT.quizz_is_done = 1
        ', ['id' => $promo->id]);

                echo '<p>' . $promo->name . " : " . count($usersDone) . "/" . count($usersTotal) . ' ont fait le quiz';

            }
            ?>
            </select>

            <form method="post"> {{ csrf_field() }}

                <select id="promoSelect" name="promoSelect">

                    <?php
                    foreach ($promoList as $promo) {
                        echo '<option value="' . $promo->id . '">' . $promo->name . '</option>';
                    };
                    ?>
                </select>
                <button id="buttonAdmin">Lancer</button>
        </div>

        </form>

        <?php
        const DistributionServiceProvider = 'app\Providers\DistributionServiceProvider.php';
        $distrib = new DistributionServiceProvider;

        if (isset($_POST['promoSelect'])) {
            $distrib->index($_POST['promoSelect']);
        }
        ?>
        <div id="buttonUPB">
            <h2 id="h2logos">rafraîchir les logos</h2>
            <p id="refreshLogo">Cliquez ici</br> pour rafraîchir les logos</br> </p>

            <form method="post"> {{ csrf_field() }}
                <button id="buttonAdminLogoLvl" name="startCheckLogolvl">Lancer</button>
            </form>
        </div>

        <?php

        const CheckLogoLvl = 'app\Providers\CheckLogoLvl.php';
        $checkLogo = new CheckLogoLvl;

        if (isset($_POST['startCheckLogolvl'])) {
            $checkLogo->startCheck();
        }
        ?>
    </div>
    <div class="buttonDown">
        <div id="buttonDownA">
    <h2>Ajouter une promotion</h2>

    <form method="post"> {{ csrf_field() }}
        <p id="instruction">Veuillez respecter le format suivant: <br> exemple: "année-campus" <br>Avec une maj à la première lettre du campus <3</p>
        <div>
            <input id="inputAdminPromo" required="required" name="namePromo"/>
            <button id="buttonAdminPromo" name="addPromo">Ajouter</button>
        </div>

    </form>


    <?php
    if (isset($_POST['addPromo'])) {
        if (DB::table('promo')->where('name', '=', $_POST['namePromo'])->exists()) {
            echo 'La promo existe déjà.';
        } else {
            DB::table('promo')->insert(
                array(
                    'name' => $_POST['namePromo']
                )
            );
            echo '<p>La promo a été créée.</p>';
        }
    }
    ?>
        </div>
        <div class="buttonDownB">
            <h2 id="addChallenge">Ajouter un défi</h2>

            <form method="post"> {{ csrf_field() }}
                <p id="nameChallenge">Nom du challenge</p>
                <input id="inputnamechallenge" required="required" name="nameChallenge"/>
                <p id="nbpoint">Nombre de points</p>
                <div>
                    <input id="inputAdminChallenge" required="required" name="numberPointsChallenge"/>
                    <button id="buttonAdminChallenge" name="addChallenge">Ajouter</button>
                </div>

            </form>

<?php
 if (isset($_POST['addChallenge'])) {
    if (DB::table('defis_type')->where('label', '=', $_POST['nameChallenge'])->exists()) {
        echo 'Le défi existe déjà.';
    }
    else {
        DB::table('defis_type')->insert(
            array(
                'label' => $_POST['nameChallenge'],
                'number_of_points' => $_POST['numberPointsChallenge']
            )
        );
        echo '<p>Le défi a été créé.</p>';
    }
}
?>



    </div>


</section>

@include("footer")
</body>
</html>
