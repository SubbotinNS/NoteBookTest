<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteBookApiController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
  Route::get('notebook',[NoteBookApiController::class,'notebook'])->middleware('auth:sanctum');;
  Route::post('notebook',[NoteBookApiController::class,'notebookadd'])->middleware('auth:sanctum');;
  Route::get('notebook/{id}',[NoteBookApiController::class,'notebookById'])->middleware('auth:sanctum');;
  Route::post('notebook/{id}',[NoteBookApiController::class,'notebookaddById'])->middleware('auth:sanctum');;
  Route::delete('notebook/{id}',[NoteBookApiController::class,'notebookdeleteById'])->middleware('auth:sanctum');;
    });

  Route::post('/auth/register',[AuthController::class,'createUser']);
  Route::post('/auth/login',[AuthController::class,'loginUser']);
