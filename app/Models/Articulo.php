<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table ='articulos';
    protected $primaryKey ='id_articulo';
    public $timestamps = false;

    public function obtener_imagenes(){
        return $this->hasMany(Imagen::class,'id_articulo');
    }

    public function obtener_categoria(){
        return $this->belongsTo(Categoria::class,'id_categoria');
    }
    
    public function obtener_estado_articulo(){
        return $this->belongsTo(Estado_Articulo::class,'id_estado_articulo');
    }

    public function obtener_user(){
        return $this->belongsTo(User::class,'id_user');
    }
    
}
