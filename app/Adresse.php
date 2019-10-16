<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    // par positif
//    protected $fillable = ['nom','prenom','adresse','adresse2','code_postal','ville','telephone','pays'];
//    // Par exclusion
    protected $guarded = ['id'];

}
