<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function adresse() {
        return $this->belongsTo('App\Adresse');
    }


    public function roles() {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    // Vérifier si un user détient un rôle
    public function hasRole($role_nom) {
//      $has_role = false;
        // Req SQL > recherche par nom de rôle parmis les rôles du user
        // first() > on ne sélectionne que 1 résultat (pas de boucle)
      $has_role=  $this->roles()->where('nom',strtolower($role_nom))->first();

      return $has_role;
    }



}
