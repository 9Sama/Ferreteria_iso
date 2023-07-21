<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plaza extends Model
{
    use HasFactory;
    protected $table='plaza';
    protected $primaryKey='idplaza';
    public $timestamps=false;
    protected $fillable=['cantidad','idpuesto','convocatoria'];

    public function puesto(){
        return $this->hasOne(puesto::class,'idpuesto','idpuesto');
    }
}
