<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;
    protected $table='personal';
    protected $primaryKey='idpersonal';
    public $timestamps=false;
    protected $fillable=['dni','apellidos','nombres','direccion','fechanac','celular','gradoEstudios','centroEstudios','fechaIng','sueldo','idpuesto'];
    public function puesto(){
        return $this->hasOne(puesto::class,'idpuesto','idpuesto');
    }
}
