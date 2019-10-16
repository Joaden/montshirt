<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommandeProduit extends Model
{
    // ne plus envoyer par défaut les champs updated_at et created_at
    public $timestamps = false;
}
