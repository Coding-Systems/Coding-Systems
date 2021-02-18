<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DistributionServiceProvider extends ServiceProvider
{
    private $listUsersPoints = array();
    private $listPlacedUsers = array();
    private $list_phoenixml = array();
    private $list_crackend = array();
    private $list_gitsune = array();
    private $unplacedUserList = array();
    private $otherUsersList = array();

    private $totalOfUsers = 0;
    private $usersUnplacedCount = 0;
    private $phoenixmlUnplaced = 0;
    private $crackendUnplaced = 0;
    private $gitsuneUnplaced = 0;
    private $otherUnplaced = 0;

    private function createFakeScores()
    {
        for ($i = 0; $i < 32; $i++) {
            $newuser = array(
                "s_phoenixml" => rand(0, 150),
                "s_gitsune" => rand(0, 150),
                "s_crackend" => rand(0, 150));

            $idStr = (1000 + $i);
            $this->listUsersPoints[$idStr] = $newuser;
        }
    }

    private function otherRepart($phoenixOther, $gitsuneOther, $crackendOther)
    {
        if ($phoenixOther[1] > $gitsuneOther[1] && $phoenixOther[1] > $crackendOther[1]) {
            if (!($phoenixOther[0] === "noOne")) {
                $userName = $phoenixOther[0];
                array_push($this->listPlacedUsers, $userName);
                array_push($this->list_phoenixml , $userName);
                unset($this->unplacedUserList[array_search($userName, $this->unplacedUserList)]);
                $this->otherUnplaced--;
                return $phoenixOther;
            }
        } else if ($gitsuneOther[1] > $phoenixOther[1] && $gitsuneOther[1] > $crackendOther[1]) {
            if (!($gitsuneOther[0] === "noOne")) {
                $userName = $gitsuneOther[0];
                array_push($this->listPlacedUsers, $userName);
                array_push($this->list_gitsune , $userName);
                unset($this->unplacedUserList[array_search($userName, $this->unplacedUserList)]);
                $this->otherUnplaced--;
                return $gitsuneOther;
            }
        } else if ($crackendOther[1] > $phoenixOther[1] && $crackendOther[1] > $gitsuneOther[1]) {
            if (!($crackendOther[0] === "noOne")) {
                $userName = $crackendOther[0];
                array_push($this->listPlacedUsers, $userName);
                array_push($this->list_crackend , $userName);
                unset($this->unplacedUserList[array_search($userName, $this->unplacedUserList)]);
                $this->otherUnplaced--;
                return $crackendOther;
            }
        }
    }

    private function firstDistrib()
    {
        $max_phoenixml = array();
        $max_gitsune = array();
        $max_crackend = array();

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

        //echo '<br>Before<br>';
        //print_r($this->unplacedUserList);

        arsort($max_crackend);
        arsort($max_gitsune);
        arsort($max_phoenixml);

        $crackendOther =['noOne', 0];
        $phoenixOther = ['noOne', 0];
        $gitsuneOther = ['noOne', 0];


        foreach ($max_phoenixml as $user=> $score) {
            if ($this->phoenixmlUnplaced > 0) {
                array_push($this->listPlacedUsers, $this->listUsersPoints[$user]);
                array_push($this->list_phoenixml, $this->listUsersPoints[$user]);
                unset($max_phoenixml[$user]);
                unset($this->unplacedUserList[$user]);
                $this->phoenixmlUnplaced--;
            } else if ($this->otherUnplaced > 0) {
                $phoenixOther = [$user, $score];
            }
        }


        foreach ($max_gitsune as $user=> $score) {
            if ($this->gitsuneUnplaced > 0) {
                array_push($this->listPlacedUsers, $this->listUsersPoints[$user]);
                array_push($this->list_gitsune, $this->listUsersPoints[$user]);
                unset($max_gitsune[$user]);
                unset($this->unplacedUserList[$user]);
                $this->gitsuneUnplaced--;
            } else if ($this->otherUnplaced > 0) {
                $phoenixOther = [$user, $score];
            }
        }

        foreach ($max_crackend as $user=> $score) {
            if ($this->crackendUnplaced > 0) {
                array_push($this->listPlacedUsers, $this->listUsersPoints[$user]);
                array_push($this->list_crackend, $this->listUsersPoints[$user]);
                unset($max_crackend[$user]);
                unset($this->unplacedUserList[$user]);
                $this->crackendUnplaced--;
            } else if ($this->otherUnplaced > 0) {
                $phoenixOther = [$user, $score];
            }
        }
    }

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
                array_push($this->listPlacedUsers, $this->listUsersPoints[$user]);
                array_push($this->list_phoenixml, $this->listUsersPoints[$user]);
                unset($middle_phoenixml[$user]);
                unset($this->unplacedUserList[$user]);
                $this->phoenixmlUnplaced--;
            } else if ($this->otherUnplaced > 0) {
                $phoenixOther = [$user, $score];
            }
        }


        foreach ($middle_gitsune as $user=> $score) {
            if ($this->gitsuneUnplaced > 0) {
                array_push($this->listPlacedUsers, $this->listUsersPoints[$user]);
                array_push($this->list_gitsune, $this->listUsersPoints[$user]);
                unset($middle_gitsune[$user]);
                unset($this->unplacedUserList[$user]);
                $this->gitsuneUnplaced--;
            } else if ($this->otherUnplaced > 0) {
                $phoenixOther = [$user, $score];
            }
        }

        foreach ($middle_crackend as $user=> $score) {
            if ($this->crackendUnplaced > 0) {
                array_push($this->listPlacedUsers, $this->listUsersPoints[$user]);
                array_push($this->list_crackend, $this->listUsersPoints[$user]);
                unset($middle_crackend[$user]);
                unset($this->unplacedUserList[$user]);
                $this->crackendUnplaced--;
            } else if ($this->otherUnplaced > 0) {
                $phoenixOther = [$user, $score];
            }
        }
    }

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

        $crackendOther =['noOne', 0];
        $phoenixOther = ['noOne', 0];
        $gitsuneOther = ['noOne', 0];


        foreach ($last_phoenixml as $user=> $score) {
            if ($this->phoenixmlUnplaced > 0) {
                array_push($this->listPlacedUsers, $this->listUsersPoints[$user]);
                array_push($this->list_phoenixml, $this->listUsersPoints[$user]);
                unset($last_phoenixml[$user]);
                unset($this->unplacedUserList[$user]);
                $this->phoenixmlUnplaced--;
            } else if ($this->otherUnplaced > 0) {
                $phoenixOther = [$user, $score];
            }
        }


        foreach ($last_gitsune as $user=> $score) {
            if ($this->gitsuneUnplaced > 0) {
                array_push($this->listPlacedUsers, $this->listUsersPoints[$user]);
                array_push($this->list_gitsune, $this->listUsersPoints[$user]);
                unset($last_gitsune[$user]);
                unset($this->unplacedUserList[$user]);
                $this->gitsuneUnplaced--;
            } else if ($this->otherUnplaced > 0) {
                $phoenixOther = [$user, $score];
            }
        }

        foreach ($last_crackend as $user=> $score) {
            if ($this->crackendUnplaced > 0) {
                array_push($this->listPlacedUsers, $this->listUsersPoints[$user]);
                array_push($this->list_crackend, $this->listUsersPoints[$user]);
                unset($last_crackend[$user]);
                unset($this->unplacedUserList[$user]);
                $this->crackendUnplaced--;
            } else if ($this->otherUnplaced > 0) {
                $phoenixOther = [$user, $score];
            }
        }
    }

    public function lanchDistribution()
    {
        $this->createFakeScores();
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

        $data['listp'] = $this->list_phoenixml;
        $data['listc'] = $this->list_crackend;
        $data['listg'] = $this->list_gitsune;
        $data['listu'] = $this->unplacedUserList;

        return $data;
    }

    public function index()
    {
        $data = $this->lanchDistribution();
        return view('test', [
            'data' => $data
        ]);

    }

    public static function indexBis($promo)
    {
        echo 'indexBis';
    }


}
