<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\User;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleGoogleCallback()
    {
        # Check if the person login with google oauth is in the database
        # TODO check edu.itescia.fr mail from the data coming from google to authorize the user
        try {
            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('/');

                # This else should later be replaced by an alert, as it does not serve purpose in the project other than testing
            } else {
                $name = explode(' ', $user->name);

                $originalLastName=$name[1];
                $resultName=ucfirst(mb_strtolower($originalLastName));
                $tabName = str_split($resultName, 1);
                $count=0;
                foreach ($tabName as $letter){
                    $count++;
                    if($letter=="-"|| $letter=='—'){
                        $resultName[$count]=mb_strtoupper($resultName[$count]);
                    }
                }

                $originalFirstName=$name[0];
                $resultFirstName=ucfirst(mb_strtolower($originalFirstName));
                $tabFirstName = str_split($resultFirstName, 1);
                $count=0;
                foreach ($tabFirstName as $letter){
                    $count++;
                    if($letter=="-"|| $letter=='—'){
                        $resultFirstName[$count]=mb_strtoupper($resultFirstName[$count]);
                    }
                }

                $newUser = User::create([
                    'first_name' => $name[0],
                    'last_name' => $resultName,
                    'mail' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy'),
                    'statut'=>'PO',
                    'logo_lvl'=>1,
                ]);

                $newUserCreated= DB::table('users')->select('id', 'statut')
                    ->where('google_id',$user->id)
                    ->get();

                $idUser= $newUserCreated[0]->id;
                $statutUser=$newUserCreated[0]->statut;

                if($statutUser=='student'){
                    DB::table('result_test')->insert(
                        array(
                            'users_id' => $idUser,
                            'score_gitsune' => "0",
                            'score_phoenixml' => "0",
                            'score_crackend' => "0"
                        )
                    );
                }

                $newUser->save();
                Auth::login($newUser);

                return redirect('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
