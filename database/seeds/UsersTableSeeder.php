<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->email = "poulpe20000@gmail.com";
        $user->name="Paul Le Poulpe";
        $user->password = \Illuminate\Support\Facades\Hash::make('123456789');
        $user->save();
        // Attribuer le rôle Admin
        $user->roles()->attach(1);
    }
}
