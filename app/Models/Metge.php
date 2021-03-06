<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metge extends Model
{
    use HasFactory;

    public function pacients(){
        return $this->hasMany(Pacient::class, 'ID_metge_associat');
    }
    public function user(){
        return $this->hasOne(User::class);
    }
}
