<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado_Articulo extends Model
{
    protected $table = 'estados_articulos';
    protected $primaryKey = 'id_estado_articulo';
    public $timestamps = false;
}
