<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicacionController extends Controller
{
    //
    public function ver(){

        $publicaciones = DB::table('publicaciones')
            ->orderBy('id','desc')
            ->limit(10)
            ->get();

        return response()->json($publicaciones);
    }

    /**
     * Permite guardar una publicacion mediante una solicitud
     *
     * @param Request $solicitud
     * @return void
     */
    public function nueva(Request $solicitud){
        $datosValidados = $solicitud->validate([
            'titulo'=>'required|string|max:50',
            'contenido'=>'required|string|max:250'
        ]);

        $publicacion = Publicacion::create($datosValidados);

        return response()->json(['mensaje'=>'Se ha agregado una publicacion', 'publicacion'=>$publicacion],201);
    }
}
