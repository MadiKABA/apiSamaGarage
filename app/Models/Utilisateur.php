<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    protected $fillable=['nom','prenom','telephone','email','password','statut','adresse','profil_id'];
    public function service(){
        $this->belongsTo(Profile::class);
    }

    public function notes(){
        return $this->hasMany(Note::class);
    }
    public function garageUtilisateurs(){
        return $this->hasMany(Garage_Utilisateur::class);
    }

    public function serviceGarges(){
        return $this->hasMany(Service_Garage::class);
    }
}
