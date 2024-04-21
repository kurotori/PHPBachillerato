<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerDatos extends Controller
{
    //
    public function pruebaSelect(){
        $datos = DB::table('datos')->select('dato')->get();
        echo $datos;
    }
}
