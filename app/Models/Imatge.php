<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imatge extends Model
{
    use HasFactory;


    public function pacient(){
        return $this->belongsTo(Pacient::class, 'id');
    }
}
