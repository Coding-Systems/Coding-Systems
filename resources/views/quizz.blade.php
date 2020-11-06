<!DOCTYPE html>
<html lang="fr">
<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
    $idUser =3;
?>

<head>
    <meta charset="UTF-8">
    <title>Coding house</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
    @include('cssSwitcher')
    <link rel="stylesheet" href="css/app.css"/>
    <link rel="stylesheet" href="css/all.css"/>
    <link href="resources/js/app.js">

<!--<?php
$numero = rand(0, 3);// un numero aléatoire de 0 à 3
?>
    <link rel="stylesheet" href="css/<?php echo $numero;?>.css)"/>-->
</head>

<body class="login">

@include("header")

<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>

    <section id="quizzPage">

        <h1>Quizz de répartition</h1>

        <p class="quizzPage">Répondez à ce quiz pour être répartit dans la maison vous correspondant le mieux.
            <br>Ou laissez le hasard total opérer en appuyant

        <form id="quizzForm" name="skipQuizzForm" method="post">
            {{ csrf_field() }}

            <input type="submit" value="ICI" name="validSkip" id="validSkip">

        </form>
            <br>
        </p>
 
        <form id="quizzForm" name="quizzForm" method="post"> <!-- PENSER A CHANGER L'ORDRE DE CERTAINES !!!!! -->
        {{ csrf_field() }} <!-- 2, 5, 10, 20-->
            <h2>Question 1</h2> <!-- valeur de la question : 5 -->
            <p class="quizzPage">À quel élément tu t'identifie le plus ?</p>
            <input type="radio" name="question1" id="Q1A1" value="PhoeniXML_5" required>
            <label for="Q1A1">Le feu, j'suis peut être un peu PYROMANE !!</label>
            <input type="radio" name="question1" id="Q1A2" value="Gitsune_5" required>
            <label for="Q1A2">La terre, c'est bien les randonnées</label>
            <input type="radio" name="question1" id="Q1A3" value="Crackend_5" required>
            <label for="Q1A3">L'eau. J'aime faire trempette</label>
            <input type="radio" name="question1" id="Q1A4" value="neutral_5" required>
            <label for="Q1A4">L'air, c'est bien de respirer de temps en temps</label>

            <h2>Question 2</h2> <!-- valeur de la question : 5 -->
            <p class="quizzPage">Quelle est ta plus grande qualité ?</p>
            <input type="radio" name="question2" id="Q2A1" value="PhoeniXML_5" required>
            <label for="Q2A1">Je suis créatif, je fais des griboullis partout !</label>
            <input type="radio" name="question2" id="Q2A2" value="Gitsune_5" required>
            <label for="Q2A2">Je suis organisé, mon bureau est bien rangé !</label>
            <input type="radio" name="question2" id="Q2A3" value="Crackend_5" required>
            <label for="Q2A3">Je suis débrouillard, je sais faire mes lacets tout seul</label>
            <input type="radio" name="question2" id="Q2A4" value="neutral_5" required>
            <label for="Q2A4">Toutes, je suis parfait bien évidemment !</label>

            <h2>Question 3</h2> <!-- valeur de la question : 10 -->
            <p class="quizzPage">Laquelle de ses choses de frustre le plus ?</p>
            <input type="radio" name="question3" id="Q3A1" value="PhoeniXML_10" required>
            <label for="Q3A1">Une tache sur beau drap blanc</label>
            <input type="radio" name="question3" id="Q3A2" value="Gitsune_10" required>
            <label for="Q3A2">Le désordre, je range mes livres par ordre alphabétique</label>
            <input type="radio" name="question3" id="Q3A3" value="Crackend_10" required>
            <label for="Q3A3">Un bruit de craie sur un tableau</label>
            <input type="radio" name="question3" id="Q3A4" value="neutral_10" required>
            <label for="Q3A4">Je suis insensible</label>

            <h2>Question 4</h2> <!-- valeur de la question : 5 -->
            <p class="quizzPage">Dans un projet, tu es plutôt celui qui... ?</p>
            <input type="radio" name="question4" id="Q4A1" value="PhoeniXML_5" required>
            <label for="Q4A1">Donne des idées, même les pires</label>
            <input type="radio" name="question4" id="Q4A2" value="Gitsune_5" required>
            <label for="Q4A2">Planifie tout, même les pauses pipi</label>
            <input type="radio" name="question4" id="Q4A3" value="Crackend_5" required>
            <label for="Q4A3">Débug le code, vive les console.log</label>
            <input type="radio" name="question4" id="Q4A4" value="neutral_5" required>
            <label for="Q4A4">Fais tout solo. Les autres me ralentissent de toute manière</label>

            <h2>Question 5</h2> <!-- valeur de la question : 2 -->
            <p class="quizzPage">Quel est ton signe astrologique ?</p>
            <input type="radio" name="question5" id="Q5A1" value="PhoeniXML_2" required>
            <label for="Q5A1">Taureau, Lion, Verseaux ou Sagitaire</label>
            <input type="radio" name="question5" id="Q5A2" value="Gitsune_2" required>
            <label for="Q5A2">Vierge, Capricorne, Balance ou Bélier</label>
            <input type="radio" name="question5" id="Q5A3" value="Crackend_2" required>
            <label for="Q5A3">Cancer, Scorpion, Gémeaux ou Poisson</label>

            <h2>Question 6</h2> <!-- valeur de la question : 10 -->
            <p class="quizzPage">En classe, tu es plutôt celui qui... ?</p>
            <input type="radio" name="question6" id="Q6A1" value="PhoeniXML_10" required>
            <label for="Q6A1">A toujours plein de gommes sur la table</label>
            <input type="radio" name="question6" id="Q6A2" value="Gitsune_10" required>
            <label for="Q6A2">Prête du matériel à tout le monde</label>
            <input type="radio" name="question6" id="Q6A3" value="Crackend_10" required>
            <label for="Q6A3">Mange et bavarde au fond mais ne se fait jamais prendre</label>
            <input type="radio" name="question6" id="Q6A4" value="neutral_10" required>
            <label for="Q6A4">Est l'élève calme du premier rang</label>

            <h2>Question 7</h2> <!-- valeur de la question : 10 -->
            <p class="quizzPage">Journée shopping. Tu achètes... ?</p>
            <input type="radio" name="question7" id="Q7A1" value="PhoeniXML_10" required>
            <label for="Q7A1">Vous vous perdez dans le rayon des loisirs créatifs</label>
            <input type="radio" name="question7" id="Q7A2" value="Gitsune_10" required>
            <label for="Q7A2">Vous suivez méticuleusement votre liste de course selon ce qu'il vous manque</label>
            <input type="radio" name="question7" id="Q7A3" value="Crackend_10" required>
            <label for="Q7A3">Peu importe, je regarde selon les promos</label>
            <input type="radio" name="question7" id="Q7A4" value="neutral_10" required>
            <label for="Q7A4">Je papillone à chaque rayon mais repart les mains vides</label>

            <h2>Question 8</h2> <!-- valeur de la question : 10 -->
            <p class="quizzPage">Un génie t’offre un voeux, lequel fais-tu ?</p>
            <input type="radio" name="question8" id="Q8A1" value="PhoeniXML_10" required>
            <label for="Q8A1">Rendre réel ce que tu souhaite</label>
            <input type="radio" name="question8" id="Q8A2" value="Gitsune_10" required>
            <label for="Q8A2">Que toute l'humanité ne soit que bienveillance</label>
            <input type="radio" name="question8" id="Q8A3" value="Crackend_10" required>
            <label for="Q8A3">Avoir des vœux illimités</label>

            <h2>Question 9</h2> <!-- valeur de la question : 10 -->
            <p class="quizzPage">Quel accessoire (tech) voudrais-tu ?</p>
            <input type="radio" name="question9" id="Q9A1" value="PhoeniXML_10" required>
            <label for="Q9A1">Une tablette graphique pour avoir des bonhommes batons en full HD</label>
            <input type="radio" name="question9" id="Q9A2" value="Gitsune_10" required>
            <label for="Q9A2">Une montre connectée pour suivre ton actualité</label>
            <input type="radio" name="question9" id="Q9A3" value="Crackend_10" required>
            <label for="Q9A3">Un Action Replay, shhhhh...</label>

            <h2>Question 10</h2> <!-- valeur de la question : 5 -->
            <p class="quizzPage">Quel animal domestique voudrais-tu ?</p>
            <input type="radio" name="question10" id="Q10A1" value="PhoeniXML_5" required>
            <label for="Q10A1">Serpent, araignées, ou autre NAC</label>
            <input type="radio" name="question10" id="Q10A2" value="Gitsune_5" required>
            <label for="Q10A2">Chien, chat, poisson, le classique</label>
            <input type="radio" name="question10" id="Q10A3" value="Crackend_5" required>
            <label for="Q10A3">Un singe, un éléphant ou un tigre, comment ça c'est illégale ? </label>
            <input type="radio" name="question10" id="Q10A4" value="neutral_5" required>
            <label for="Q10A4">Aucun, je suis mieux sans</label>

            <h2>Question 11</h2> <!-- valeur de la question : 5 -->
            <p class="quizzPage">De quelle OS team est-tu ?</p>
            <input type="radio" name="question11" id="Q11A1" value="PhoeniXML_5" required>
            <label for="Q11A1">Windows pour faire tourner Minecraft</label>
            <input type="radio" name="question11" id="Q11A2" value="Gitsune_5" required>
            <label for="Q11A2">Mac pour son côté épuré</label>
            <input type="radio" name="question11" id="Q11A3" value="Crackend_5" required>
            <label for="Q11A3">Linux pour être libre de tout contrôler</label>

            <h2>Question 12</h2> <!-- valeur de la question : 2 -->
            <p class="quizzPage">Votre boisson favorite ?</p>
            <input type="radio" name="question12" id="Q12A1" value="PhoeniXML_2" required>
            <label for="Q12A1">Les jus de fruits naturels, c'est bon pour la santé !</label>
            <input type="radio" name="question12" id="Q12A2" value="Gitsune_2" required>
            <label for="Q12A2">L'eau, sans gout mais indémodable</label>
            <input type="radio" name="question12" id="Q12A3" value="Crackend_2" required>
            <label for="Q12A3">Les Sodas parce que j'aime le sucre</label>
            <input type="radio" name="question12" id="Q12A4" value="neutral_2" required>
            <label for="Q12A4">Une bonne bière pour avoir les idées eau clair.</label>

            <!--<h2>Question 13</h2> Valeur de la question : 2000
            <p class="quizzPage">Quel est ton couple Goal à la Coding ?</p>
            <input type="radio" name="question13" id="Q13A1" value="PhoeniXML_2000">
            <label for="Q13A1">Thibaud et Alyssia mais elle ne l'avouera jamais</label>
            <input type="radio" name="question13" id="Q13A2" value="Gitsune_2000">
            <label for="Q13A2">Olaf et Marion. Elle aime les grosses carottes</label>
            <input type="radio" name="question13" id="Q13A3" value="Crackend_2000">
            <label for="Q13A3">Les fesses d'Anis et la main d'Axel, le duo parfait !</label>
            <input type="radio" name="question13" id="Q13A4" value="neutral__2000">
            <label for="Q13A4">Hugo et le scrumstick. L'agile en profondeur</label>
            <input type="radio" name="question13" id="Q13A3" value="neutral__2000">
            <label for="Q13A3">Houssam et son mac, le courant passe si bien</label>-->

            <h2>Question 14</h2> <!-- valeur de la question : 2 -->
            <p class="quizzPage">Tes fleurs préférées ?</p>
            <input type="radio" name="question14" id="Q14A1" value="PhoeniXML_2" required>
            <label for="Q14A1">Des roses pour leur variété</label>
            <input type="radio" name="question14" id="Q14A2" value="Gitsune_2" required>
            <label for="Q14A2">Des orchidées, signe de réconciliation</label>
            <input type="radio" name="question14" id="Q14A3" value="Crackend_2" required>
            <label for="Q14A3">Des Lotus parce que c'est classe de pousser sur l'eau</label>

            <h2>Question 15</h2> <!-- valeur de la question : 5 -->
            <p class="quizzPage">Quel est ton moyen de transport favoris ? </p>
            <input type="radio" name="question15" id="Q15A1" value="PhoeniXML_5" required>
            <label for="Q15A1">À pied c'est bon pour le cardio</label>
            <input type="radio" name="question15" id="Q15A2" value="Gitsune_5" required>
            <label for="Q15A2">Le bon vieux vélo pour l'écologie</label>
            <input type="radio" name="question15" id="Q15A3" value="Crackend_5" required>
            <label for="Q15A3">Une voiture par personne voyons !</label>
            <input type="radio" name="question15" id="Q15A4" value="neutral_5" required>
            <label for="Q15A4">Les transports en communs, j'aime les gens</label>

            <h2>Question 16</h2> <!-- valeur de la question : 10 -->
            <p class="quizzPage">Quel pouvoir aimerais-tu avoir ?</p>
            <input type="radio" name="question16" id="Q16A1" value="PhoeniXML_10" required>
            <label for="Q16A1">L'immortalité pour voir si les voitures volantes existeront</label>
            <input type="radio" name="question16" id="Q16A2" value="Gitsune_10" required>
            <label for="Q16A2">Figer le temps pour ramasser ta tasse de café</label>
            <input type="radio" name="question16" id="Q16A3" value="Crackend_10" required>
            <label for="Q16A3">Passer à travers la matière pour t'échapper de prison</label>
            <input type="radio" name="question16" id="Q16A4" value="neutral_10" required>
            <label for="Q16A4">Lire dans les pensées pour savoir si ton crush est réciproque</label>

            <h2>Question 17</h2> <!-- valeur de la question : 10 -->
            <p class="quizzPage">Quel thème utilises-tu sur ton ordinateur ?</p>
            <input type="radio" name="question17" id="Q17A1" value="PhoeniXML_10" required>
            <label for="Q17A1">Un thème 100% personnalisé</label>
            <input type="radio" name="question17" id="Q17A2" value="Gitsune_10" required>
            <label for="Q17A2">Un thème clair, pour éblouir mon entourage</label>
            <input type="radio" name="question17" id="Q17A3" value="Crackend_10" required>
            <label for="Q17A3">Un thème sombre, comme mes intentions</label>
            <input type="radio" name="question17" id="Q17A4" value="neutral_10" required>
            <label for="Q17A4">Ah parce que ça se change ?</label>

            <h2>Question 18</h2> <!-- valeur de la question : 5 -->
            <p class="quizzPage">Enfin majeur ! Que fais-tu en premier ?</p>
            <input type="radio" name="question18" id="Q18A1" value="PhoeniXML_5" required>
            <label for="Q18A1">Je fais la tournée des bars, c'est moi qui régale !</label>
            <input type="radio" name="question18" id="Q18A2" value="Gitsune_5" required>
            <label for="Q18A2">Je prépare soigneusement mon bulletin de vote, c'est important !</label>
            <input type="radio" name="question18" id="Q18A3" value="Crackend_5" required>
            <label for="Q18A3">Enfin aller sur des sites X sans mentir</label>
            <input type="radio" name="question18" id="Q18A4" value="neutral_5" required>
            <label for="Q18A4">Ah parce que ça change quelque chose ?</label>

            <h2>Question 19</h2> <!-- valeur de la question : 20 -->
            <p class="quizzPage">Quel est ton premier choix de System ?</p>
            <input type="radio" name="question19" id="Q19A1" value="PhoeniXML_20" required>
            <label for="Q19A1">PhoeniXML</label>
            <input type="radio" name="question19" id="Q19A2" value="Gitsune_20" required>
            <label for="Q19A2">Gitsune</label>
            <input type="radio" name="question19" id="Q19A3" value="Crackend_20" required>
            <label for="Q19A3">Crack'end</label>
            <input type="radio" name="question19" id="Q19A4" value="neutral_20" required>
            <label for="Q19A4">J'en sais fishtrement rien</label>

            <h2>Question 20</h2> <!-- valeur de la question : 10 -->
            <p class="quizzPage">Quel est ton second choix de System ?</p>
            <input type="radio" name="question20" id="Q20A1" value="PhoeniXML_10" required>
            <label for="Q20A1">PhoeniXML</label>
            <input type="radio" name="question20" id="Q20A2" value="Gitsune_10" required>
            <label for="Q20A2">Gitsune</label>
            <input type="radio" name="question20" id="Q20A3" value="Crackend_10" required>
            <label for="Q20A3">Crack'end</label>
            <input type="radio" name="question20" id="Q20A4" value="neutral_10" required>
            <label for="Q20A4">J'en sais fishtrement rien</label>

            <!--
            <h2>Question X</h2>
            <p class="quizzPage">BLABBALBALABLABLABLABALA ?</p>
            <input type="radio" name="questionX" id="QXA1" value="1" required>
            <label for="QXA1">BLA</label>
            <input type="radio" name="questionX" id="QXA2" value="Gitsune_" required>
            <label for="QXA2">BLA</label>
            <input type="radio" name="questionX" id="QXA3" value="Crackend_" required>
            <label for="QXA3">BLA</label>
            <input type="radio" name="questionX" id="QXA4" value="neutral_" required>
            <label for="QXA4">BLA</label>

            <br></b>

            --></br>
            <input type="submit" value="Envoyer" name="envoi" id="submitButton">

        </form>

        <?php
        if(isset($_POST['envoi'])){
            $reponse_1 = $_POST['question1'];
            $reponse_2 = $_POST['question2'];
            $reponse_3 = $_POST['question3'];
            $reponse_4 = $_POST['question4'];

            $score_gitsune = 0;
            $score_crackend = 0;
            $score_phoenixml = 0;
            $pas_de_reponse = 0;

            if ($reponse_1 == '1')
            {
                $score_crackend++;
            }
            else if ($reponse_1 == '2'){
                $score_gitsune++;
            }
            else if ($reponse_1 == '3'){
                $score_phoenixml++;
                }
            else{
                $pas_de_reponse++;
            };

            if ($reponse_2 == '1')
            {
                $score_crackend++;
            }
            else if ($reponse_2 == '2'){
                $score_gitsune++;
            }
            else if ($reponse_2 == '3'){
                $score_phoenixml++;
                }
            else{
                $pas_de_reponse++;
            };

            if ($reponse_3 == '1')
            {
                $score_crackend++;
            }
            else if ($reponse_3 == '2'){
                $score_gitsune++;
            }
            else if ($reponse_3 == '3'){
                $score_phoenixml++;
                }
            else{
                $pas_de_reponse++;
            };

            if ($reponse_4 == '1')
            {
                $score_crackend++;
            }
            else if ($reponse_4 == '2'){
                $score_gitsune++;
            }
            else if ($reponse_4 == '3'){
                $score_phoenixml++;
                }
            else{
                $pas_de_reponse++;
            };
/*
            DB::table('defis')
                ->where('id', $idDefi)
                ->update(array('winner_id' => $idWinner));
*/

            DB::table('result_test')
                ->where('users_id' , Auth::user()->id)
                ->update(
                array(
                    'score_gitsune' => "$score_gitsune",
                    'score_phoenixml' => "$score_phoenixml",
                    'score_crackend' => "$score_crackend",
                    'quizz_is_done' => "1"
                )
                );

            //*********** Code temporaire pour la démo ***********

            $array = array('3'=>$score_gitsune, '2'=>$score_phoenixml, '1'=>$score_crackend);
            arsort($array);
            $house=array_keys($array)[0];

            DB::table('users')
                ->where('id' , Auth::user()->id)
                ->update(
                    array(
                        'house_id' => "$house",
                    )
                );


            //return redirect('/profil');
        }

        else if(isset($_POST['validSkip'])){
            DB::table('result_test')
                ->where('users_id' , Auth::user()->id)
                ->update(
                    array(
                        'quizz_is_done' => "1"
                    )
                );
        }

        ?>
    </section>


@include("footer")

</body>

</html>
