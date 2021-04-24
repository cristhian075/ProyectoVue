<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $users = array(
            [
                'name' => 'Cristhian Felipe',
                'email' => 'tafurcf903@gmail.com',
                'password' => Hash::make('00761075')

            ],

            [
                'name' => 'Felipe',
                'email' => 'Ramirez0076@gmail.com',
                'password' => Hash::make('00761075')

            ]
        );

        foreach($users as $users){
            User::updateOrCreate($users);
        }
    }
}
