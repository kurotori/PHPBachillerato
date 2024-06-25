<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function crear(Request $solicitud){
        $datos_validados = $solicitud->validate([
            'name'=>'required|string|max:255|unique:users',
            'email'=>'required|string|max:255|unique:users',
            'password'=>'required|string|max:255'
        ]);

        $usuario = User::create($datos_validados);

    }
}
