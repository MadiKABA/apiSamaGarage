<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable=['nomClient','telephone','email','contenu','dateCommentaire','annonce_id'];

    public function annonce(){
        return $this->belongsTo(Annonce::class);
    }
}
