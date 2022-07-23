<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_Factura extends Model
{
    protected $table ='detalles_factura';
    protected $primaryKey='id_detalle_factura';
    public $timestamps=false;   

    public function obtener_factura(){
        return $this->belongsTo(Factura::class,'id_factura');
    }
}
