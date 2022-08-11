<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAnnonce extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    protected $with=['annonces'];

    public function annonces(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Annonce::class,'typeAnnonce_id');
    }
}
