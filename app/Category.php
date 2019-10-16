<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    // Récupérer les produits d'une catégorie
    public function produits() {
        return $this->hasMany('App\Produit');
    }

}
