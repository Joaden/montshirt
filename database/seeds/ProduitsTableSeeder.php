<?php

use Illuminate\Database\Seeder;

class ProduitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $produit = new \App\Produit();
//        $produit->nom = "T-Shirt Goonies";
//        $produit->prix_ht = 25.90;
//        $produit->description = "T-Shirt du film les goonies";
//        $produit->photo_principale = "goonies.jpg";
//        // ORM Eloquent > qui prend en charge l'insertion dans la db > via PDO en arrière plan
//        $produit->save();

        $produit = new \App\Produit();
        $produit->nom = "T-Shirt Star Trek";
        $produit->prix_ht = 15.90;
        $produit->description = "T-Shirt du film Star Trek";
        $produit->photo_principale = "star_trek_kirk.jpg";
        // ORM Eloquent > qui prend en charge l'insertion dans la db > via PDO en arrière plan
        $produit->category_id = 1;
        $produit->save();

        $produit = new \App\Produit();
        $produit->nom = "T-Shirt M.Happy";
        $produit->prix_ht = 9.90;
        $produit->description = "T-Shirt M.Happy";
        $produit->photo_principale = "happy.jpg";
        // ORM Eloquent > qui prend en charge l'insertion dans la db > via PDO en arrière plan
        $produit->category_id = 2;
        $produit->save();

        $produit = new \App\Produit();
        $produit->nom = "T-Shirt Hulk";
        $produit->prix_ht = 9.90;
        $produit->description = "T-Shirt qui rend super fort";
        $produit->photo_principale = "hulk.jpg";
        // ORM Eloquent > qui prend en charge l'insertion dans la db > via PDO en arrière plan
        $produit->category_id = 2;
        $produit->save();

        $produit = new \App\Produit();
        $produit->nom = "T-Shirt Krusty Le Clown";
        $produit->prix_ht = 9.90;
        $produit->description = "T-Shirt qui fait rire";
        $produit->photo_principale = "krusty_simpsons.jpg";
        // ORM Eloquent > qui prend en charge l'insertion dans la db > via PDO en arrière plan
        $produit->category_id = 3;
        $produit->save();


        $produit = new \App\Produit();
        $produit->nom = "T-Shirt SuperMan";
        $produit->prix_ht = 9.90;
        $produit->description = "J'aime pas ce mec";
        $produit->photo_principale = "super_man.jpg";
        // ORM Eloquent > qui prend en charge l'insertion dans la db > via PDO en arrière plan
        $produit->category_id = 4;
        $produit->save();


        $produit = new \App\Produit();
        $produit->nom = "T-Shirt Wonder Woman";
        $produit->prix_ht = 9.90;
        $produit->description = "moi...";
        $produit->photo_principale = "wonder_woman.jpg";
        // ORM Eloquent > qui prend en charge l'insertion dans la db > via PDO en arrière plan
        $produit->category_id = 5;
        $produit->save();



    }
}
