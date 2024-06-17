<?php

use App\Models\Publicacion;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('api/publicaciones/',
    function(){
        $respuesta = new stdClass();
        $respuesta->publicaciones = array();

        foreach(Publicacion::all() as $publicacion){
            array_push($respuesta->publicaciones, $publicacion);
        }

        return response()->json($respuesta);
    }
);

