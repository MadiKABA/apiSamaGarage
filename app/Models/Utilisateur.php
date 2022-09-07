<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;



class Utilisateur extends Authenticatable
{

    use HasApiTokens,HasFactory;
    protected $fillable=['nom','prenom','telephone','email','password','statut','adresse','profil_id'];
    protected $with=['garages'];

    public function garages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Garage::class);
    }
    public function profile(){
        return $this->belongsTo(Profile::class);
    }
}
