<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    use HasFactory;

    protected $fillable=['nom','description','longitude','latitude','heureOurverture',
        'heureFermeture','adresse','image','zone_id'];

    public function zone(){
        return $this->belongsTo(Zone::class);
    }
    public function notes(){
        return $this->hasMany(Note::class);
    }
    public function utilisateurs(){
        return $this->belongsTo(Utilisateur::class);
    }
}
