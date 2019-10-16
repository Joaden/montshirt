<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new \App\Role();
        $role->nom  = 'admin';
        $role->description  = 'gestionnaire du site ecommerce';
        $role->save();

        $role2 = new \App\Role();
        $role2->nom  = 'client';
        $role2->description  = 'a commandé au moins une fois sur le site';
        $role2->save();

    }
}
