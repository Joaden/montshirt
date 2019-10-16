<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    private static $facteur_tva = 1.2;

    public function prixTTC() {
        return $this->prix_ht * self::$facteur_tva;
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }


}
