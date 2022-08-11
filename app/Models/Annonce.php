<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable=['titre','description','prix','urlImage','datePublication','statut',
        'cloture','typeAnnonce_id','utilisateur_id'];
    protected $with=["commentaires"];
    use HasFactory;

    public function type_annonce(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TypeAnnonce::class);
    }
    public function utilisateur(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Utilisateur::class);
    }
    public function commentaires(){
        return $this->hasMany(Commentaire::class,'annonce_id');
    }
}
