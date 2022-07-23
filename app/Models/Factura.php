<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table='facturas';
    protected $primaryKey='id_factura';
    public $timestamps=false;

    public function obtener_detalles(){
        return $this->hasMany(Detalle_Factura::class,'id_factura');
    }

    public function obtener_direccion(){
        return $this->belongsTo(Direccion::class,'id_user');
    }

    public function obtener_user(){
        return $this->belongsTo(User::class,'id_user');
    }
}
