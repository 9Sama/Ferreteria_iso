<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $timestamps=false;
    protected $table = 'area';
    protected $primaryKey = 'idarea';
    protected $fillable = [
        'nombre',
        'descripcion',
        'estado',
    ];
    public function puesto(){
        return $this->hasMany(puesto::class,'idpuesto','idpuesto');
    }
}
