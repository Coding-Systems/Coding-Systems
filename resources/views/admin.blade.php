<!DOCTYPE html>
<html lang="fr">
<?php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use App\Providers\DistributionServiceProvider;
    //const DistributionServiceProvider = 'app\Providers\DistributionServiceProvider.php';
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

            <p>Lancer la répartition</p>
            <form method="post"> {{ csrf_field() }} <select id="promoSelect" name="promoSelect">
            <?php
         $promoList = DB::select('SELECT id, name
         FROM promo WHERE is_distributed = false');

         foreach ($promoList as $promo){
            echo '<option value="'.$promo->id.'">'.$promo->name.'</option>';
        };

        ?>
                </select>
            <button>Start</button>

            </form>

            <?php
            const DistributionServiceProvider = 'app\Providers\DistributionServiceProvider.php';
            $distrib = new DistributionServiceProvider;

             if(isset($_POST['promoSelect'])){
                 $distrib->indexBis($_POST['promoSelect']);
                 //echo $_POST['promoSelect'];
            }
            ?>
        </section>

        @include("footer")
    </body>
</html>
