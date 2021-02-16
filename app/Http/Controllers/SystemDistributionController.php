<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SystemDistributionController extends Controller
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
        //return $listUsersPoints;
    }

    private function otherRepart($phoenixOther, $gitsuneOther, $crackendOther)
    {
        if ($phoenixOther[1] > $gitsuneOther[1] && $phoenixOther[1] > $crackendOther[1]) {
            if (!($phoenixOther[0] === "noOne")) {
                $userName = $phoenixOther[0];
                array_push($this->listPlacedUsers, $userName);
                array_push($this->list_phoenixml , $userName);
                unset($this->unplacedUserList[array_search($userName, $this->unplacedUserList)]);
                //Reflect.deleteProperty($unplacedUserList, $userName);
                $this->otherUnplaced--;
                return $phoenixOther;
            }
        } else if ($gitsuneOther[1] > $phoenixOther[1] && $gitsuneOther[1] > $crackendOther[1]) {
            if (!($gitsuneOther[0] === "noOne")) {
                $userName = $gitsuneOther[0];
                array_push($this->listPlacedUsers, $userName);
                array_push($this->list_gitsune , $userName);
                unset($this->unplacedUserList[array_search($userName, $this->unplacedUserList)]);
                //Reflect.deleteProperty($unplacedUserList, $userName);
                $this->otherUnplaced--;
                return $gitsuneOther;
            }
        } else if ($crackendOther[1] > $phoenixOther[1] && $crackendOther[1] > $gitsuneOther[1]) {
            if (!($crackendOther[0] === "noOne")) {
                $userName = $crackendOther[0];
                array_push($this->listPlacedUsers, $userName);
                array_push($this->list_crackend , $userName);
                unset($this->unplacedUserList[array_search($userName, $this->unplacedUserList)]);
                //Reflect.deleteProperty($unplacedUserList, $userName);
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

        foreach ($this->listUsersPoints as $userName) {
            array_push($this->unplacedUserList , $userName);
            //$scoresList = $this->listUsersPoints[ $userName];
            $scoresList = $this->listUsersPoints[ key($this->listUsersPoints)];

            $maxSyst = "";
            $maxScore = 0;
            foreach ($scoresList as $score) {
                //$value = $scoresList[$score];
                $value = $score;
                if ($value > $maxScore) {
                    $maxScore = $value;
                    //$maxSyst = explode("_", $score)[1];
                    $maxSyst = explode("_", $score);
                }

            }
            switch ($maxSyst) {
                case "phoenixml":
                    $max_phoenixml[$userName] = $this->listUsersPoints[$userName]['s_phoenixml'];
                    break;
                case "gitsune":
                    $max_gitsune[$userName] = $this->listUsersPoints[$userName]['s_gitsune'];
                    break;
                case "crackend":
                    $max_crackend[$userName] = $this->listUsersPoints[$userName]['s_crackend'];
                    break;
                default:
                    //console.log("Error first distrib find max syst");
            }
        }

        /*
        $max_crackendBis = array();
        foreach ($max_crackend as $score) {
            $max_crackendBis.push([$score, $max_crackend[$score]]);
        }
        arsort($max_crackendBis);

        $max_phoenixmlBis = array();
        foreach ($max_phoenixml as $score) {
            $max_phoenixmlBis.push([$score, $max_phoenixml[$score]]);
        }
        arsort($max_phoenixmlBis);

        $max_gitsuneBis = array();
        foreach ($max_gitsune as $score) {
        $max_gitsuneBis . push([$score, $max_gitsune[$score]]);
    }
        arsort($max_gitsuneBis);



        $max_crackend = array();
        $max_crackendBis .foreach($element => {
        $max_crackend . push($element[0])
        });

        max_gitsune = []
        max_gitsuneBis .foreach(element => {
        max_gitsune . push(element[0])
        });

        max_phoenixml = []
        max_phoenixmlBis .foreach(element => {
        max_phoenixml . push(element[0])
        });

        */

        arsort($max_crackend);
        arsort($max_gitsune);
        arsort($max_phoenixml);

        $crackendOther =['noOne', 0];
        $phoenixOther = ['noOne', 0];
        $gitsuneOther = ['noOne', 0];

        /*foreach ($max_phoenixml as $userName) {
            if ($this->phoenixmlUnplaced > 0) {
                $this->listPlacedUsers . push($userName);
                $this->list_phoenixml . push($userName);
                unset($this->max_phoenixml[array_search($userName, $this->max_phoenixml)]);
                unset($this->unplacedUserList[array_search($userName, $this->unplacedUserList)]);
                $this->phoenixmlUnplaced--;
            } else if (otherUnplaced > 0) {
                $phoenixOther = [userName, listUsersPoints[userName]["s_phoenixml"]];
            }
        }
        */

        if ($this->otherUnplaced > 0) {
            $repartedOne = $this->otherRepart($phoenixOther, $gitsuneOther, $crackendOther);

            if ($this->otherUnplaced > 0) {

                if ($repartedOne == $phoenixOther) {
                    $phoenixOther = array(['noOne', 0]);
                } else if ($repartedOne == $gitsuneOther) {
                    $gitsuneOther = array(['noOne', 0]);
                } else if ($repartedOne == $crackendOther) {
                    $crackendOther = array(['noOne', 0]);
                }
                $this->otherRepart($phoenixOther, $gitsuneOther, $crackendOther);
            }
        }

        //$this->unplacedUserList = unplacedUserList . filter(x => !listPlacedUsers . includes(x));

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


}
