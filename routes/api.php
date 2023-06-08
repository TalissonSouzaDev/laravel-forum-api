<?php

use App\Http\Controllers\Api\ComentarioController;
use App\Http\Controllers\Api\SubforumController;
use App\Http\Controllers\Api\TopicoController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\LoginRegisterController;
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

Route::middleware('auth:sanctum')->group(function(){


    
/**
 * 
 * Logout 
 */

 Route::post('/logout',[LoginRegisterController::class,'logout']);


/**
 * 
 * FORUM 
 */

 Route::post('/subforum/store',[SubforumController::class,'store']);
 Route::get('/subforum/edit/{id}',[SubforumController::class,'edit']);
 Route::put('/subforum/update/{id}',[SubforumController::class,'update']);
 Route::delete('/subforum/destroy/{id}',[SubforumController::class,'destroy']);
 
 
 /**
  * 
  * topico 
  */
  Route::post('/topico/store',[TopicoController::class,'store']);
  Route::get('/topico/edit/{id}',[TopicoController::class,'edit']);
  Route::put('/topico/update/{id}',[TopicoController::class,'update']);
  Route::delete('/topico/destroy/{id}',[TopicoController::class,'destroy']);
 
  /**
  * 
  * comentario 
  */
  Route::post('/comentario/store',[ComentarioController::class,'store']);
  Route::put('/comentario/update/{id}',[ComentarioController::class,'update']);
  Route::delete('/comentario/destroy/{id}',[ComentarioController::class,'destroy']);



});

/**
 * 
 * login 
 */

 //Route::get('/user',[UserController::class,'index']);
 Route::post('/login',[LoginRegisterController::class,'login']);
 Route::post('/register',[LoginRegisterController::class,'register']);

 /**
 * 
 * FORUM 
 */

 Route::get('/subforum',[SubforumController::class,'index']);

  /**
  * 
  * topico 
  */
  Route::get('/topico/{idsubforum}',[TopicoController::class,'index']);

    /**
  * 
  * comentario 
  */
 
  Route::get('/comentario/{idtopico}',[ComentarioController::class,'index']);





