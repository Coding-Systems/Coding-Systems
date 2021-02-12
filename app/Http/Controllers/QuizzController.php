<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizzController
{
    public function index()
    {
        $jsonString = file_get_contents(base_path('resources/data/quizQuestion.json'));
        $data = json_decode($jsonString, true)['questions'];
        return view('quizz', [
            'data' => $data
        ]);
    }
    public function quizzResult()
    {
        if (isset($_POST['skipQuizzForm'])) {
            DB::table('result_test')
                ->where('users_id' , Auth::user()->id)
                ->update(
                    array(
                        'quizz_is_done' => "1"
                    )
                );
            return redirect('/profil');
        }
        //temporary else statement, should be deleted when the test code below this code block will no longer be needed
        else {
            $jsonString = file_get_contents(base_path('resources/data/quizQuestion.json'));
            $data = json_decode($jsonString, true)['questions'];


            $score_phoenixml = 0;
            $score_crackend = 0;
            $score_gitsune = 0;

            foreach ($_POST['answers'] as $key=>$answer) {
                switch ($data[$key][$answer - 1]) {
                    case 'PhoeniXML':
                        $score_phoenixml++;
                        break;
                    case 'Gitsune':
                        $score_crackend++;
                        break;
                    case 'Crackend':
                        $score_gitsune++;
                        break;
                }
            }

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
        }




        //*********** Code temporaire pour la démo -- allow to class a user directly into a System after the quiz ***********

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

        // todo redirect to a page indicating that the result of the quiz will be taking in account later
        return redirect('/profil');
    }
}
