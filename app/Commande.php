<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    // Lier l'acheteur à la commande
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function produits() {
        return $this->belongsToMany("App\Produit","commande_produits")->withPivot('qte','prix_unitaire_ttc','prix_unitaire_ht','prix_total_ttc','prix_total_ht');
    }

}
