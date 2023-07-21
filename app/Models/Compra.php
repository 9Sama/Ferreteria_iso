<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $table = 'ingreso';
    protected $primaryKey = 'idingreso';
    protected $guarded = [''];
    public $timestamps=false;
}
