<?php

use Maatwebsite\Excel\Concerns\ToModel;

class UsersImportAxel implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new User([
            'email'     => $row[0],
            'firstname' => $row[1],
            'lastname'  => $row[2],
        ]);

    }
}

function getArrayListUsers(){
    $all = Excel::toArray(new UsersImportAxel, storage_path('../users.xlsx'));
    //print_r ($all);
    $usersList= $all[0];
    return $usersList;
}



