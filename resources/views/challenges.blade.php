<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Coding house</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.scss"/>
    <link rel="stylesheet" href="css/pages/challenges.scss"/>
</head>

<body>

@include('header')

<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>

<h1>Défis</h1>

<h2>Choisisez votre défis :</h2>

<form class="listDefi">
    <select size="5">
        <option>Défis 0 </option>
        <option>Défis 1 </option>
        <option>Défis 2 </option>
        <option>Défis 3 </option>
        <option>Défis 4 </option>
        <option>Défis 5 </option>
        <option>Défis 6 </option>
        <option>Défis 7 </option>
        <option>Défis 8 </option>
        <option>Défis 9 </option>
        <option>Défis 10 </option>
        <option>Défis 11 </option>
        <option>Défis 12 </option>
        <option>Défis 13 </option>
        <option>Défis 14 </option>
        <option>Défis 15 </option>
        <option>Défis 16 </option>
        <option>Défis 17 </option>
        <option>Défis 18 </option>
        <option>Défis 19 </option>
    </select>
</form>

<h2>Choisisez votre adversaire :</h2>

<form class="listAdv">
    <div class="buttonRadio">
        <input type="radio" name="maison" value="M1" checked>Maison 1
        <input type="radio" name="maison" value="M2">Maison 2
    </div>



    <select size="5" value="M1">
        <option>(M1)Adversaire 0 </option>
        <option>(M1)Adversaire 1 </option>
        <option>(M1)Adversaire 2 </option>
        <option>(M1)Adversaire 3 </option>
        <option>(M1)Adversaire 4 </option>
        <option>(M1)Adversaire 5 </option>
        <option>(M1)Adversaire 6 </option>
        <option>(M1)Adversaire 7 </option>
        <option>(M1)Adversaire 8 </option>
        <option>(M1)Adversaire 9 </option>
    </select>

    <select size="5" value="M2">
        <option>(M2)Adversaire 10 </option>
        <option>(M2)Adversaire 11 </option>
        <option>(M2)Adversaire 12 </option>
        <option>(M2)Adversaire 13 </option>
        <option>(M2)Adversaire 14 </option>
        <option>(M2)Adversaire 15 </option>
        <option>(M2)Adversaire 16 </option>
        <option>(M2)Adversaire 17 </option>
        <option>(M2)Adversaire 18 </option>
        <option>(M2)Adversaire 19 </option>
    </select>
</form>

<h2>Choisisez votre arbitre :</h2>

<form class="listArb">

    <select size="5">
        <option>Arbitre 0 </option>
        <option>Arbitre 1 </option>
        <option>Arbitre 2 </option>
        <option>Arbitre 3 </option>
        <option>Arbitre 4 </option>
        <option>Arbitre 5 </option>
        <option>Arbitre 6 </option>
        <option>Arbitre 7 </option>
        <option>Arbitre 8 </option>
        <option>Arbitre 9 </option>
        <option>Arbitre 10 </option>
        <option>Arbitre 11 </option>
        <option>Arbitre 12 </option>
        <option>Arbitre 13 </option>
        <option>Arbitre 14 </option>
        <option>Arbitre 15 </option>
        <option>Arbitre 16 </option>
        <option>Arbitre 17 </option>
        <option>Arbitre 18 </option>
        <option>Arbitre 19 </option>
    </select>

    <table>
        <thead>
        <tr>
            <th colspan="2">Demande de défis ou d'arbitrage</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Alyssia : Défis de PFC</td>
            <td><input type="button" value="Accepter"><input type="button" value="Refuser"></td>
        </tr>
        <tr>
            <td>Marion : Arbitrage de PFC</td>
            <td><input type="button" value="Accepter"><input type="button" value="Refuser"></td>
        </tr>
        </tbody>
    </table>
</form>

@include('footer')

</body>
