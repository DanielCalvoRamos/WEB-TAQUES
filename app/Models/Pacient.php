<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Pacient extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    protected $fillable = ['email','nom','cognom','data_naixament','num_imatges','contrasena','ID_metge_associat','num_fotos'];


    public function metge(){
        return $this->belongsTo(Metge::class, 'id');
    }

    public function imatges(){
        return $this->hasMany(Imatge::class, 'id');
    }
}
