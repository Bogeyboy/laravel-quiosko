<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', function(Request $request){
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    
    //Almacenamiento de órdenes
    Route::apiResource('/pedidos', PedidoController::class);
});

/* Route::get('/categorias',[CategoriaController::class,'index']); */
Route::apiResource('/categorias', CategoriaController::class);
Route::apiResource('/productos', ProductoController::class);

//Autenticación
Route::post('/registro', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);