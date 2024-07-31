<?php

namespace App\Http\Controllers;

use App\Models\Publicaciones;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    //
    public function crear(Request $solicitud){
        $validacion = $solicitud->validate([
            'titulo'=>'required|string|max:50',
            'contenido'=>'required|string|max:255',
            'user_id'=>'required|integer',
        ]);

        $publicacion = Publicaciones::create($validacion);
        return response()->json(['message' => 'Publicación Creada', 'item' => $publicacion], 201);
    }



    public function verUltimas(Request $solicitud){

        $datos = Publicaciones::with('autor:id,name')
            ->orderBy('created_at','desc')->take($solicitud->n)->get();


        foreach($datos as $dato){
            echo($dato);
            //$publicaciones = $dato;
            //$publicaciones->usuario = $dato->autor()->name;
        }

        //return response()->json(['publicaciones'=>$publicaciones]);
    }
}
