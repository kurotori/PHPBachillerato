<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PublicacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/registrar',
    [RegisteredUserController::class, 'store']
);

Route::post('/login',
    [AuthenticatedSessionController::class, 'store']
);

Route::middleware(['auth:sanctum'])->post('/logout',
    function(Request $request){
        return $request->user()->tokens()->delete();
    }
   // [AuthenticatedSessionController::class, 'destroy']
);

Route::post('/publicaciones/crear',
    [PublicacionController::class,'crear']
);


Route::get('/publicaciones/ultimas/{n}',
    [PublicacionController::class,'verUltimas']
);

