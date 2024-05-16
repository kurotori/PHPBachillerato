<?php

use Illuminate\Support\Facades\Route;

Route::get('/',
    function () {
        return view('welcome');
    }
);

Route::get(
    'solicitud/{dato}',
    function ($dato){
        $respuesta = new Respuesta();
        $respuesta->dato = "$dato";
        $respuesta->algo = "OK";

        return response()->json($respuesta);
    }
);

class Respuesta{
    public $dato;
    public $algo;
}
