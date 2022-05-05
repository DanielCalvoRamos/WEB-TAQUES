<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imatge extends Model
{
    use HasFactory;
    protected $fillable = ['ID_pacient_associat','data_pujada','imatge_pujada'];

    public function pacient(){
        return $this->belongsTo(Pacient::class, 'id');
    }
}
