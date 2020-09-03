<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = "admin";
        $admin->email = "admin@gmail.com";
        $admin->password = bcrypt('123456');
        $admin->gender =User::GENDER_MALE ;
        $admin->role =User::ROLE_SUPER_ADMIN ;
        $admin->save();

        $admin = new User();
        $admin->name = "gv1";
        $admin->email = "gv1@gmail.com";
        $admin->password = bcrypt('123456');
        $admin->gender =User::GENDER_MALE ;
        $admin->role =User::ROLE_ADMIN ;
        $admin->save();

        $admin = new User();
        $admin->name = "gv2";
        $admin->email = "gv2@gmail.com";
        $admin->password = bcrypt('123456');
        $admin->gender =User::GENDER_MALE ;
        $admin->role =User::ROLE_ADMIN ;
        $admin->save();

        $admin = new User();
        $admin->name = "gv3";
        $admin->email = "gv3@gmail.com";
        $admin->password = bcrypt('123456');
        $admin->gender =User::GENDER_MALE ;
        $admin->role =User::ROLE_ADMIN ;
        $admin->save();

        $user = new User();
        $user->name = "viet hoang";
        $user->birthday = "02/3/1999";
        $user->code = "17020770";
        $user->email = "hoang@gmail.com";
        $user->password = bcrypt('123456');
        $user->class = 'K62-CD';
        $user->gender =User::GENDER_MALE ;
        $user->role =User::ROLE_USER ;
        $user->save();

        $user = new User();
        $user->name = "viet tu";
        $user->birthday = "12/5/1999";
        $user->code = "1702624";
        $user->email = "tu@gmail.com";
        $user->password = bcrypt('123456');
        $user->class = 'K62-M';
        $user->gender =User::GENDER_MALE ;
        $user->role =User::ROLE_USER ;
        $user->save();

        $user = new User();
        $user->name = "viet linh";
        $user->birthday = "23/9/1999";
        $user->code = "17025410";
        $user->email = "linh@gmail.com";
        $user->password = bcrypt('123456');
        $user->class = 'K62-L';
        $user->gender =User::GENDER_FEMALE ;
        $user->role =User::ROLE_USER ;
        $user->save();

    }
}
