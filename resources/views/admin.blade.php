<!DOCTYPE html>
<html lang="fr">
<?php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
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
            <button>Start</button>
        </section>
        @include("footer")
    </body>
sss
</html>
