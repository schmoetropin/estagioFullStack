<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TarefaRequest;
use App\Http\Requests\TarefaUpdateRequest;
use App\Models\Tarefa;

class TarefasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // exibe a pagina principal
        $tarefas = Tarefa::all();
        $tarNI = Tarefa::where('nao_iniciado','=',1)->get();
        $tarEM = Tarefa::where('em_andamento','=',1)->get();
        $tarC = Tarefa::where('concluido','=',1)->get();
        return view('tarefas/index',[
            'nao_iniciado'=> $tarNI,
            'em_andamento'=> $tarEM,
            'concluido'=> $tarC,
            'tarefas'=> $tarefas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TarefaRequest $request)
    {
        // salva dados de uma nova tarefa
        $data = $request->validated();
        $tarefa = Tarefa::insert([
            'titulo'=> $data['titulo'],
            'nao_iniciado'=> 1,
            'data_tarefa'=> date('Y-m-d H:i:s')
        ]);
        return $this->redirecionarPagina();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TarefaRequest $request, $id)
    {
        // edita o titulo determinada tarefa
        $data = $request->validated();
        $tarefa = Tarefa::find($id);
        $tarefa->update([
            'titulo'=> $data['titulo']
        ]);
        return $this->redirecionarPagina();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TarefaUpdateRequest $request, $id)
    {
        // edita o estado nao iniciado ou pronto de uma tarefa
        $data = $request->validated();
        $tipo = $data['updateTarefa'];
        $tarefa = Tarefa::find($id);
        if($tipo == 'naoIniciado'){
            $tarefa->update([
                'nao_iniciado'=>1,
                'em_andamento'=>0,
                'concluido'=>0,
                'data_tarefa'=> date('Y-m-d H:i:s')
            ]);
        }else if($tipo == 'emAndamento'){
            $tarefa->update([
                'nao_iniciado'=>0,
                'em_andamento'=>1,
                'concluido'=>0,
                'data_tarefa'=> date('Y-m-d H:i:s')
            ]);
        }else{
            $tarefa->update([
                'nao_iniciado'=>0,
                'em_andamento'=>0,
                'concluido'=>1,
                'data_tarefa'=> date('Y-m-d H:i:s')
            ]);
        }
        return $this->redirecionarPagina();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // deleta uma tarefa
        $tarefa = Tarefa::find($id);
        $tarefa->delete();
        return $this->redirecionarPagina();
    }

    public function deletar_nao_iniciado(){
        // deleta todas tarefas nao iniciadas
        Tarefa::where('nao_iniciado','=',1)->delete();
        return $this->redirecionarPagina();
    }
    
    public function deletar_em_andamento(){
        // deleta todas tarefas em andamento
        Tarefa::where('em_andamento','=',1)->delete();
        return $this->redirecionarPagina();
    }
    
    public function deletar_concluido(){
        // deleta todas tarefas concluidas
        Tarefa::where('concluido','=',1)->delete();
        return $this->redirecionarPagina();
    }

    public function deletar_todas_tarefas(){
        // deleta todas tarefas
        Tarefa::truncate();
        return $this->redirecionarPagina();
    }

    private function redirecionarPagina(){
        $tarefas = Tarefa::all();
        return redirect(route('index',['tarefas'=>$tarefas]));
    }
}
