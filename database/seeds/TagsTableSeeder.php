<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tag = new \App\Tag();
        $tag->nom = "#fun";
        $tag->save();

        $tag2 = new \App\Tag();
        $tag2->nom = "#drôle";
        $tag2->save();

        $tag3 = new \App\Tag();
        $tag3->nom = "#enfant";
        $tag3->save();

        $tag4 = new \App\Tag();
        $tag4->nom = "#chelou";
        $tag4->save();

        $tag5 = new \App\Tag();
        $tag5->nom = "#rouge";
        $tag5->save();

        $tag6 = new \App\Tag();
        $tag6->nom = "#bleu";
        $tag6->save();

        $tag7 = new \App\Tag();
        $tag7->nom = "#vert";
        $tag7->save();
    }
}
