<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraDetail extends Model
{
    use HasFactory;
    protected $table = 'detalle_ingreso';
    protected $primaryKey = 'iddetalle_ingreso';
    protected $guarded = [''];
    public $timestamps=false;
}
