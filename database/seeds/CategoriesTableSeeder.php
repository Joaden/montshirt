<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $cat = new \App\Category();
//        $cat->nom = "Films";
//        $cat->save();
//
//        $cat2 = new \App\Category();
//        $cat2->nom = "Séries TV";
//        $cat2->is_online = 1;
//        $cat2->save();
//
//        $cat3 = new \App\Category();
//        $cat3->nom = "Musique";
//        $cat3->is_online = 1;
//        $cat3->save();
//
//        $cat4 = new \App\Category();
//        $cat4->nom = "Jeux-Vidéos";
//        $cat4->is_online = 1;
//        $cat4->save();
//
//        $cat5 = new \App\Category();
//        $cat5->nom = "Sport";
//        $cat5->save();

        $cat6 = new \App\Category();
        $cat6->nom = "Autres";
        $cat6->save();
    }
}
