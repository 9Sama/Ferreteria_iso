<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $table = 'articulo';
    protected $primaryKey = 'idarticulo';
    protected $guarded = [''];
    public $timestamps=false;
}
