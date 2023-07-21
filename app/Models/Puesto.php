<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;
    protected $table='puesto';
    protected $primaryKey='idpuesto';
    public $timestamps=false;
    protected $fillable=['nombre','descripcion','estado','idarea'];

    public function area(){
        return $this->hasOne(area::class,'idarea','idarea');
    }
    public function plaza(){
        return $this->hasMany(puesto::class,'idplaza','idplaza');
    }
    public function personal(){
        return $this->hasMany(puesto::class,'idpersonal','idpersonal');
    }
}
