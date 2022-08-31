<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable=['libelle','description'];

    public function serviceGarages(){
        return $this->hasMany(Service_Garage::class);
    }
    public function garages(){
        return $this->belongsToMany(Garage::class);
    }
}
