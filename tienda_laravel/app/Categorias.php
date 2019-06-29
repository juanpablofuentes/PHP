<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model {

    protected $table = "categorias";
    protected $primaryKey = "idcategoria";
    public $timestamps = false;
    public $fillable=['nombre','descripcion'];
}
