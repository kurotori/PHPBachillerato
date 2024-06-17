<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    //
    public function ver(){
        return Publicacion::all();
    }

    public function buscar(Request $solicitud){
        return Publicacion::where('id',$solicitud->termino)->get();
    }
}
