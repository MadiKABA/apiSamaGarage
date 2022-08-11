<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceGarage extends Model
{
    use HasFactory;

    protected $fillable=['service_id','garage_id'];

    public function garage(){
        return $this->belongsTo(Garage::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
}
