<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $fillable=['commentaire','note','nomClient','email','telephone','dateNote','garage_id'];
    public function garage(){
        return $this->belongsTo(Garage::class);
    }
}
