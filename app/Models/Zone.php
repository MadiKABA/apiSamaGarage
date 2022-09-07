<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $fillable=['libelle'];
    protected $with=['garages'];

    public function garages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Garage::class);
    }
}



