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
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/all.css"/>
    <link href="resources/js/app.js">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body>
@include("header")
<section>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <h1>Admin</h1>

    <H2>Lancer la répartition</H2>

    <?php
    $promoList = DB::select('SELECT id, name
            FROM promo WHERE is_distributed = false');

    //foreach ($promoList as $promo)
    ?>

    <h3>Ratio de personnes ayant répondu :</h3>

        <?php
        foreach ($promoList as $promo)
            {

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

            echo '<p>'.$promo->name." : ".count($usersDone)."/".count($usersTotal).' ont fait le quiz';

            }
        ?>
                </select>

    <form method="post"> {{ csrf_field() }} <select id="promoSelect" name="promoSelect">

            <?php
            foreach ($promoList as $promo) {
                echo '<option value="' . $promo->id . '">' . $promo->name . '</option>';
            };
            ?>
        </select>
        <button id="buttonAdmin">Start</button>
    </form>

    <?php
    const DistributionServiceProvider = 'app\Providers\DistributionServiceProvider.php';
    $distrib = new DistributionServiceProvider;

    if (isset($_POST['promoSelect'])) {
        $distrib->index($_POST['promoSelect']);
    }
    ?>

    <h2>Lancer l'amélioration des logos</h2>

    <form method="post"> {{ csrf_field() }}
        <button id="buttonAdminLogoLvl" name="startCheckLogolvl">Start</button>
    </form>

    <?php

    const CheckLogoLvl = 'app\Providers\CheckLogoLvl.php';
    $checkLogo = new CheckLogoLvl;

    if (isset($_POST['startCheckLogolvl'])) {
        $checkLogo->startCheck();
    }
    ?>



</section>

@include("footer")
</body>
</html>
