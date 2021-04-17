<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;

class DistributionServiceProvider
{
    private $listUsersPoints = array();
    private $listPlacedUsers = array();
    private $list_phoenixml = array();
    private $list_crackend = array();
    private $list_gitsune = array();
    private $unplacedUserList = array();
    private $otherUsersList = array();
    private $promo=999;

    private $totalOfUsers = 0;
    private $usersUnplacedCount = 0;
    private $phoenixmlUnplaced = 0;
    private $crackendUnplaced = 0;
    private $gitsuneUnplaced = 0;
    private $otherUnplaced = 0;

    //Get the users form the db in the wanted promo
    private function getuserList($promo)
    {
        $listUsers = DB::table('result_test')
            ->join('users', 'users.id', '=', 'result_test.users_id')
            ->select('users_id' , 'score_gitsune', 'score_crackend', 'score_phoenixml')
            ->where('users.promo_id', '=', $promo)
            ->get();

        //Add the id and scores of each user in listUsersPoints
        foreach ($listUsers as $user){
            $userScores = array(
                "s_phoenixml" => $user->score_phoenixml,
                "s_gitsune" => $user->score_gitsune,
                "s_crackend" => $user->score_crackend,);
            $this->listUsersPoints[$user->users_id] = $userScores;
        }
    }

    //Add users in systems for case when the number of users isn't %3
    private function otherRepart($phoenixOther, $gitsuneOther, $crackendOther)
    {
        if ($phoenixOther[1] > $gitsuneOther[1] && $phoenixOther[1] > $crackendOther[1]) {
            if (!($phoenixOther[0] === "noOne")) {
                $userName = $phoenixOther[0];
                array_push($this->listPlacedUsers, $userName);
                array_push($this->list_phoenixml , $userName);
                unset($this->unplacedUserList[array_search($userName, $this->unplacedUserList)]);
                $this->otherUnplaced--;
                return "phoenixOther";
            }
        } else if ($gitsuneOther[1] > $phoenixOther[1] && $gitsuneOther[1] > $crackendOther[1]) {
            if (!($gitsuneOther[0] === "noOne")) {
                $userName = $gitsuneOther[0];
                array_push($this->listPlacedUsers, $userName);
                array_push($this->list_gitsune , $userName);
                unset($this->unplacedUserList[array_search($userName, $this->unplacedUserList)]);
                $this->otherUnplaced--;
                return "gitsuneOther";
            }
        } else if ($crackendOther[1] > $phoenixOther[1] && $crackendOther[1] > $gitsuneOther[1]) {
            if (!($crackendOther[0] === "noOne")) {
                $userName = $crackendOther[0];
                array_push($this->listPlacedUsers, $userName);
                array_push($this->list_crackend , $userName);
                unset($this->unplacedUserList[array_search($userName, $this->unplacedUserList)]);
                $this->otherUnplaced--;
                return "crackendOther";
            }
        }
    }

    //Start the distribution of users in their first score system
    private function firstDistrib()
    {
        $max_phoenixml = array();
        $max_gitsune = array();
        $max_crackend = array();

        //For each users, search the greater score
        foreach ($this->listUsersPoints as $userId => $userScores) {
            $maxSyst = "";
            $maxScore = 0;
            foreach ($userScores as $system => $score) {
                if ($score >= $maxScore) {
                    $maxScore = $score;
                    $maxSyst = $system;
                }
            }
            $this->unplacedUserList[$userId] = $this->listUsersPoints[$userId];
            //array_push($this->unplacedUserList, $this->listUsersPoints[$userId]);

            $maxSyst = explode("_", $maxSyst)[1];

            //Add users in the list of the right system
            switch ($maxSyst) {
                case "phoenixml":
                    $max_phoenixml[$userId] = $maxScore;
                    break;
                case "gitsune":
                    $max_gitsune[$userId] = $maxScore;
                    break;
                case "crackend":
                    $max_crackend[$userId] = $maxScore;
                    break;
                default:
            }
        }

        //Sort users by score
        arsort($max_crackend);
        arsort($max_gitsune);
        arsort($max_phoenixml);

        $crackendOther =['noOne', 0];
        $phoenixOther = ['noOne', 0];
        $gitsuneOther = ['noOne', 0];

        //Add users of each system list while list empty or number limit achieved
        foreach ($max_phoenixml as $user=> $score) {
            if ($this->phoenixmlUnplaced > 0) {
                $this->listPlacedUsers[$user]= $this->listUsersPoints[$user];
                $this->list_phoenixml[$user]= $this->listUsersPoints[$user];
                unset($max_phoenixml[$user]);
                unset($this->unplacedUserList[$user]);
                $this->phoenixmlUnplaced--;
            } else if ($this->otherUnplaced > 0) {
                $phoenixOther = [$user, $score];
                break;
            }
        }

        foreach ($max_gitsune as $user=> $score) {
            if ($this->gitsuneUnplaced > 0) {
                $this->listPlacedUsers[$user]= $this->listUsersPoints[$user];
                $this->list_gitsune[$user]= $this->listUsersPoints[$user];
                unset($max_gitsune[$user]);
                unset($this->unplacedUserList[$user]);
                $this->gitsuneUnplaced--;
            } else if ($this->otherUnplaced > 0) {
                $gitsuneOther = [$user, $score];
                break;
            }
        }

        foreach ($max_crackend as $user=> $score) {
            if ($this->crackendUnplaced > 0) {
                $this->listPlacedUsers[$user]= $this->listUsersPoints[$user];
                $this->list_crackend[$user]= $this->listUsersPoints[$user];
                unset($max_crackend[$user]);
                unset($this->unplacedUserList[$user]);
                $this->crackendUnplaced--;
            } else if ($this->otherUnplaced > 0) {
                $crackendOther = [$user, $score];
                break;
            }
        }

        //Launc otherepart for specific cases
        if($this->otherUnplaced > 0) {
            $repartedOne = $this->otherRepart($phoenixOther, $gitsuneOther, $crackendOther);

            if ( $this->otherUnplaced > 0) {
                if($repartedOne == "phoenixml") {
                    $phoenixOther = ['noOne', 0];
                }
                else if($repartedOne == "gitsune") {
                    $gitsuneOther = ['noOne', 0];
                }
                else if($repartedOne == "crackend") {
                    $crackendOther = ['noOne', 0];
                }
                $this->otherRepart($phoenixOther, $gitsuneOther, $crackendOther);
            }
        }
    }

    //Same as firstDistrib but with second system by score
    private function secondDistrib()
    {
        $middle_phoenixml = array();
        $middle_gitsune = array();
        $middle_crackend = array();

        foreach ($this->unplacedUserList as $userId => $userScores) {
            $maxSyst = "";
            $maxScore = 0;
            arsort($userScores);
            $count=0;
            foreach ($userScores as $syst=>$score){

                if($count ==1){
                    $maxSyst=  $syst;
                    $maxScore= $score;
                }
                $count++;
            }

            $this->unplacedUserList[$userId] = $this->listUsersPoints[$userId];
            //array_push($this->unplacedUserList, $this->listUsersPoints[$userId]);

            $maxSyst = explode("_", $maxSyst)[1];

            switch ($maxSyst) {
                case "phoenixml":
                    $middle_phoenixml[$userId] = $maxScore;
                    break;
                case "gitsune":
                    $middle_gitsune[$userId] = $maxScore;
                    break;
                case "crackend":
                    $middle_crackend[$userId] = $maxScore;
                    break;
                default:
            }
        }

        //echo '<br>Before<br>';
        //print_r($this->unplacedUserList);

        arsort($middle_crackend);
        arsort($middle_phoenixml);
        arsort($middle_gitsune);

        $crackendOther =['noOne', 0];
        $phoenixOther = ['noOne', 0];
        $gitsuneOther = ['noOne', 0];


        foreach ($middle_phoenixml as $user=> $score) {
            if ($this->phoenixmlUnplaced > 0) {
                $this->listPlacedUsers[$user]= $this->listUsersPoints[$user];
                $this->list_phoenixml[$user]= $this->listUsersPoints[$user];
                unset($middle_phoenixml[$user]);
                unset($this->unplacedUserList[$user]);
                $this->phoenixmlUnplaced--;
            } else if ($this->otherUnplaced > 0) {
                $phoenixOther = [$user, $score];
                break;
            }
        }


        foreach ($middle_gitsune as $user=> $score) {
            if ($this->gitsuneUnplaced > 0) {
                $this->listPlacedUsers[$user]= $this->listUsersPoints[$user];
                $this->list_gitsune[$user]= $this->listUsersPoints[$user];
                unset($middle_gitsune[$user]);
                unset($this->unplacedUserList[$user]);
                $this->gitsuneUnplaced--;
            } else if ($this->otherUnplaced > 0) {
                $gitsuneOther = [$user, $score];
                break;
            }
        }

        foreach ($middle_crackend as $user=> $score) {
            if ($this->crackendUnplaced > 0) {
                $this->listPlacedUsers[$user]= $this->listUsersPoints[$user];
                $this->list_crackend[$user]= $this->listUsersPoints[$user];
                unset($middle_crackend[$user]);
                unset($this->unplacedUserList[$user]);
                $this->crackendUnplaced--;
            } else if ($this->otherUnplaced > 0) {
                $crackendOther = [$user, $score];
                break;
            }
        }

        if($this->otherUnplaced > 0) {
            $repartedOne = $this->otherRepart($phoenixOther, $gitsuneOther, $crackendOther);

            if ( $this->otherUnplaced > 0) {
                if($repartedOne == "phoenixml") {
                    $phoenixOther = ['noOne', 0];
                }
                else if($repartedOne == "gitsune") {
                    $gitsuneOther = ['noOne', 0];
                }
                else if($repartedOne == "crackend") {
                    $crackendOther = ['noOne', 0];
                }
                $this->otherRepart($phoenixOther, $gitsuneOther, $crackendOther);
            }
        }
    }

    //Same as firstDistrib but with system with less score
    private function lastDistrib()
    {
        $last_phoenixml = array();
        $last_gitsune = array();
        $last_crackend = array();

        foreach ($this->unplacedUserList as $userId => $userScores) {
            $lastSyst = "";
            $maxScore = 10000000;
            foreach ($userScores as $system => $score) {
                if ($score <= $maxScore) {
                    $maxScore = $score;
                    $lastSyst = $system;
                }
            }
            $this->unplacedUserList[$userId] = $this->listUsersPoints[$userId];
            //array_push($this->unplacedUserList, $this->listUsersPoints[$userId]);

            $lastSyst = explode("_", $lastSyst)[1];

            switch ($lastSyst) {
                case "phoenixml":
                    $last_phoenixml[$userId] = $maxScore;
                    break;
                case "gitsune":
                    $last_gitsune[$userId] = $maxScore;
                    break;
                case "crackend":
                    $last_crackend[$userId] = $maxScore;
                    break;
                default:
            }
        }

        //echo '<br>Before<br>';
        //print_r($this->unplacedUserList);

        arsort($last_crackend);
        arsort($last_gitsune);
        arsort($last_phoenixml);

        foreach ($last_phoenixml as $user=> $score) {
            if ($this->phoenixmlUnplaced > 0) {
                $this->listPlacedUsers[$user]= $this->listUsersPoints[$user];
                $this->list_phoenixml[$user]= $this->listUsersPoints[$user];
                unset($last_phoenixml[$user]);
                unset($this->unplacedUserList[$user]);
                $this->phoenixmlUnplaced--;
            }
        }


        foreach ($last_gitsune as $user=> $score) {
            if ($this->gitsuneUnplaced > 0) {
                $this->listPlacedUsers[$user]= $this->listUsersPoints[$user];
                $this->list_gitsune[$user]= $this->listUsersPoints[$user];
                unset($last_gitsune[$user]);
                unset($this->unplacedUserList[$user]);
                $this->gitsuneUnplaced--;
            }
        }

        foreach ($last_crackend as $user=> $score) {
            if ($this->crackendUnplaced > 0) {
                $this->listPlacedUsers[$user]= $this->listUsersPoints[$user];
                $this->list_crackend[$user]= $this->listUsersPoints[$user];
                unset($last_crackend[$user]);
                unset($this->unplacedUserList[$user]);
                $this->crackendUnplaced--;
            }
        }
    }

    //Boucle for dispatch last users in the system with the less members
    public function lastUsers(){

        for ($i=0; $i<count($this->unplacedUserList); $i++){

            //echo"Unplaced";
            //print_r($this->unplacedUserList);

            $countSystems = array(
                'phoenixml' => count($this->list_phoenixml),
                'gistune' => count($this->list_gitsune),
                'crackend' => count($this->list_crackend)
            );

            asort($countSystems);

            $userId = array_key_first($this->unplacedUserList);

            switch (array_key_first($countSystems)) {
                case 'phoenixml' :
                    $this->listPlacedUsers[$userId]= $this->listUsersPoints[$userId];
                    $this->list_phoenixml[$userId]= $this->listUsersPoints[$userId];
                    unset($this->unplacedUserList[$userId]);
                    break;
                case 'crackend' :
                    $this->listPlacedUsers[$userId]= $this->listUsersPoints[$userId];
                    $this->list_crackend[$userId]= $this->listUsersPoints[$userId];
                    unset($this->unplacedUserList[$userId]);
                    break;
                case 'gitsune' :
                    $this->listPlacedUsers[$userId]= $this->listUsersPoints[$userId];
                    $this->list_gitsune[$userId]= $this->listUsersPoints[$userId];
                    unset($this->unplacedUserList[$userId]);
                    break;
            }

        //echo '<br>'.count($this->unplacedUserList).'<br>';
        }
    }

    //Call the others for the distribution ans initialize global value
    public function lanchDistribution()
    {
        $data['orininalList'] = $this->listUsersPoints;

        $this->totalOfUsers = count($this->listUsersPoints);
        $this->usersUnplacedCount = $this->totalOfUsers;
        $this->phoenixmlUnplaced = round($this->usersUnplacedCount / 3, 0, PHP_ROUND_HALF_UP);
        $this->crackendUnplaced = round($this->usersUnplacedCount / 3, 0, PHP_ROUND_HALF_UP);
        $this->gitsuneUnplaced = round($this->usersUnplacedCount / 3, 0, PHP_ROUND_HALF_UP);
        $this->otherUnplaced = $this->totalOfUsers % 3;

        $this->firstDistrib();
        $this->secondDistrib();
        $this->lastDistrib();
        if(count($this->unplacedUserList)>0){
            $this->lastUsers();
        }

        $data['listp'] = $this->list_phoenixml;
        $data['listc'] = $this->list_crackend;
        $data['listg'] = $this->list_gitsune;
        $data['listu'] = $this->unplacedUserList;

        return $data;
    }

    //Update the database with the list get with the distribution
    //Add the users in the right system and update the total of pts of each system
    public function sendToDB() {
        //Update of gitsune
        $listGitsuneId = array();
        foreach ($this->list_gitsune as $gitsuneId => $gitsuneScore){
            array_push($listGitsuneId, $gitsuneId);
            DB::table('users')
                ->where("id", $gitsuneId)
                ->update(
                    array(
                        'system_id'=>"3",
                        'updated_at' =>date("Y-m-d H:i:s")
                    )
                );
            $user_pts = DB::table('users')
                ->select('total_pts', 'total_pts_note', 'total_pts_po', 'total_pts_defi')
                ->where('id', $gitsuneId)
                ->get();
            DB::table('systems')
                ->where("id", "3")
                ->update([
                    'total_pts' => DB::raw('total_pts + '.strval($user_pts[0]->total_pts)),
                    'total_pts_note' => DB::raw('total_pts_note + '.strval($user_pts[0]->total_pts_note)),
                    'total_pts_po' => DB::raw('total_pts_po + '.strval($user_pts[0]->total_pts_po)),
                    'total_pts_defi' => DB::raw('total_pts_defi +'.strval($user_pts[0]->total_pts_defi)),
                ]);
        }

        //Update of phoenixml
        $listPhoenixmlId = array();
        foreach ($this->list_phoenixml as $phonixmlId => $phoenixmlScore){
            array_push($listPhoenixmlId, $phonixmlId);

            DB::table('users')
                ->where("id", $phonixmlId)
                ->update(
                    array(
                        'system_id'=>"2",
                        'updated_at' =>date("Y-m-d H:i:s")
                    )
                );
            $user_pts = DB::table('users')
                ->select('total_pts', 'total_pts_note', 'total_pts_po', 'total_pts_defi')
                ->where('id', $phonixmlId)
                ->get();
            DB::table('systems')
                ->where("id", "2")
                ->update([
                    'total_pts' => DB::raw('total_pts + '.strval($user_pts[0]->total_pts)),
                    'total_pts_note' => DB::raw('total_pts_note + '.strval($user_pts[0]->total_pts_note)),
                    'total_pts_po' => DB::raw('total_pts_po + '.strval($user_pts[0]->total_pts_po)),
                    'total_pts_defi' => DB::raw('total_pts_defi +'.strval($user_pts[0]->total_pts_defi)),
                ]);
        }

        //Update of crack'end
        $listCrackendId = array();
        foreach ($this->list_crackend as $crackendId => $crackendScore){
            array_push($listCrackendId, $crackendId);

            DB::table('users')
                ->where("id", $crackendId)
                ->update(
                    array(
                        'system_id'=>"1",
                        'updated_at' =>date("Y-m-d H:i:s")
                    )
                );
            $user_pts = DB::table('users')
                ->select('total_pts', 'total_pts_note', 'total_pts_po', 'total_pts_defi')
                ->where('id', $crackendId)
                ->get();
            DB::table('systems')
                ->where("id", "1")
                ->update([
                    'total_pts' => DB::raw('total_pts + '.strval($user_pts[0]->total_pts)),
                    'total_pts_note' => DB::raw('total_pts_note + '.strval($user_pts[0]->total_pts_note)),
                    'total_pts_po' => DB::raw('total_pts_po + '.strval($user_pts[0]->total_pts_po)),
                    'total_pts_defi' => DB::raw('total_pts_defi +'.strval($user_pts[0]->total_pts_defi)),
                ]);
        }

        //Set the promo to is_distributed = true
        DB::table('promo')
            ->where("id", $this->promo)
            ->update(
                array(
                    'is_distributed'=>"1"
                )
            );
    }

    public function index($promo)
    {
        $this->promo = $promo;
        //echo '<br>Start distribution, id promo : '.$promo.'<br>';
        $this->getuserList($promo);
        $this->lanchDistribution();
        //echo '<br>Après la répartition<br>';
        //print_r($this->list_gitsune);
        //print_r($this->list_crackend);
        //print_r($this->list_phoenixml);
        $this->sendToDB();

        echo '<br>Répartition terminée ;)<br>';
    }

}
