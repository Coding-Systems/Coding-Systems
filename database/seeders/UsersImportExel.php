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
            'mail'     => $row[0],
            'firstname' => $row[1],
            'lastname'  => $row[2],
            'status'    => $row[3],
            'is_admin'  => $row[4],
            'promo_id'  => $row[5]
        ]);
    }
}

function getArrayListUsers($pathFile){
    $all = Excel::toArray(new UsersImportAxel, storage_path($pathFile));
    //print_r ($all);
    $usersList= $all[0];
    return $usersList;
}



