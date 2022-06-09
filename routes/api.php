<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefasController;

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
Route::post('/tarefas/store',[TarefasController::class, 'store'])->name('store');
Route::put('/tarefas/edit/{id}',[TarefasController::class, 'edit'])->name('edit');
Route::put('/tarefas/update/{id}',[TarefasController::class, 'update'])->name('update');
Route::delete('/tarefas/destroy/{id}',[TarefasController::class, 'destroy'])->name('delete');
Route::delete('/tarefas/del/naoIniciado',[TarefasController::class, 'deletar_nao_iniciado'])->name('deleteNInic');
Route::delete('/tarefas/del/emAndamento',[TarefasController::class, 'deletar_em_andamento'])->name('deleteEmAnd');
Route::delete('/tarefas/del/concluido',[TarefasController::class, 'deletar_concluido'])->name('deleteConc');
Route::delete('/tarefas/del/all',[TarefasController::class, 'deletar_todas_tarefas'])->name('deleteAll');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
