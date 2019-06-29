<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Prueba extends Controller
{
    function saludo($nombre="desconocido"){
        return view("saludo",['nombre'=>$nombre,'tiposaludo'=>"HOla"]);
    }
    function despedida(){
       return view("despedida");
    }
    function suma($a,$b){
        echo $a+$b;
    }
}
