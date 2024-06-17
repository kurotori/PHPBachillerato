<?php

use App\Http\Controllers\EchoController;
use App\Http\Controllers\PublicacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('pruebas/', [EchoController::class,'verDatos']);

Route::get('publicaciones/',
    [PublicacionController::class,'ver']
);

Route::post('nueva/',
    [PublicacionController::class,'nueva']
);

Route::post('pruebas/', function (Request $request){
    return response()->json($request->all());
});



