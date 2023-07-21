<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    public $timestamps=false;
    protected $table = 'postulante';
    protected $primaryKey = 'idpostulante';
    protected $fillable = [
        'dni',
        'apellidos',
        'nombres',
        'direccion',
        'celular',
        'fechanac',
        'gradoEstudios',
        'centroEstudios',
    ];
}
