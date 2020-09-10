<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name'=> $row[2],
            'email'=> $row[1]."@vnu.edu.vn",
            'birthday' =>$row[3],
            'code' => $row[1],
            'gender' => $row[4],
            'class' => $row[5],
            'role' => User::ROLE_USER,
            'password' => bcrypt($row[1]),
        ]);
    }
}
