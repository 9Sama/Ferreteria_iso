<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaDetail extends Model
{
    use HasFactory;
    protected $table = 'detalle_venta';
    protected $primaryKey = 'iddetalle_venta';
    protected $guarded = [''];
    public $timestamps=false;
}
