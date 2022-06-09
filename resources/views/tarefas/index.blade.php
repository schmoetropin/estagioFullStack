@extends('layout')
@section('conteudo')
<h1 class="siteTitulo">Gerenciador De Tarefas</h1>
<form action="{{route('store')}}" method="POST"x class="tarForm">
    @csrf
    <input type="text" name="titulo" placeholder="Adicionar uma nova tarefa..." />
    <button type="submit">Adicionar</button>
</form>
<div class="areaBotaoTarefas">
    @if($nao_iniciado->count() > 0)
        <form action="{{route('deleteNInic')}}" method="POST">
            @method('delete')
            <button class="botao botaoLaranja botaoGrande">Excluir Tarefas Não Iniciadas</button>
        </form>
    @endif
    @if($em_andamento->count() > 0)
        <form action="{{route('deleteEmAnd')}}" method="POST">
            @method('delete')
            <button class="botao botaoAzul botaoGrande">Excluir Tarefas Em Andamento</button>
        </form>
    @endif
    @if($concluido->count() > 0)
        <form action="{{route('deleteConc')}}" method="POST">
            @method('delete')
            <button class="botao botaoVerde botaoGrande">Excluir Tarefas Concluídas</button>
        </form>
    @endif
    @if($tarefas->count() > 0)
        <form action="{{route('deleteAll')}}" method="POST">
            @method('delete')
            <button class="botao botaoVermelho botaoGrande">Excluir Todas As Tarefas</button>
        </form>
    @endif
</div>
<div class="divTarefas">
    <!-------------------- 
    ----NAO INICIADO 
    --------------------->
    <h3 class="nao_iniciado">Não iniciado</h3>
    <div class="areaTarefas">
        @if($nao_iniciado->count() == 0)
            <div class="tarefa t_nao_iniciado avisoTarefa">
                <small>Nenhuma tarefa não iniciada</small>
            </div>
        @else
            @foreach($nao_iniciado as $t)
                <input type="hidden" class="tarefaId" value="{{$t->id}}" />
                <div class="tarefa t_nao_iniciado">
                    <!-- dados da tarefa -->
                    <small>Atividade: {{$t->titulo}}</small><br />
                    <small>Data: {{$t->data_tarefa}}</small>
                    <div class="tarefaFormularios">
                        <!-- formulario atualizar para em andamento -->
                        <form action="{{route('update',['id'=>$t->id])}}" method="POST">
                            @method('put')
                            @csrf
                            <input type="hidden" name="updateTarefa" value="emAndamento" />
                            <button class="botao botaoAzul">Em andamanto</button>
                        </form>
                        <!-- formulario atualizar para concluido -->
                        <form action="{{route('update',['id'=>$t->id])}}" method="POST">
                            @method('put')
                            @csrf
                            <input type="hidden" name="updateTarefa" value="concluido" />
                            <button class="botao botaoVerde">Concluido</button>
                        </form>
                        <!-- formulario atualizar para excluir -->
                        <form action="{{route('delete',['id'=> $t->id])}}" method="POST">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="delete" value="delete" />
                            <button class="botao botaoVermelho">Excluir</button>
                        </form>
                        <!-- botao para abrir editar titulo da tarefa -->
                        <button id="abrirEditTTit{{$t->id}}" class="botao botaoAmarelo">Editar</button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<div class="divTarefas">
    <!-------------------- 
    ----EM ANDAMENTO
    --------------------->
    <h3 class="em_andamento">Em andamento</h3>
    <div class="areaTarefas">
        @if($em_andamento->count() == 0)
            <div class="tarefa t_em_andamento avisoTarefa">
                <small>Nenhuma tarefa em andamento</small>
            </div>
        @else
            @foreach($em_andamento as $t)
                <input type="hidden" class="tarefaId" value="{{$t->id}}" />
                <div class="tarefa t_em_andamento">
                    <!-- dados da tarefa -->
                    <small>Atividade: {{$t->titulo}}</small><br />
                    <small>Data: {{$t->data_tarefa}}</small>
                    <div class="tarefaFormularios">
                        <!-- formulario atualizar para nao iniciado -->
                        <form action="{{route('update',['id'=>$t->id])}}" method="POST">
                            @method('put')
                            @csrf
                            <input type="hidden" name="updateTarefa" value="naoIniciado" />
                            <button class="botao botaoLaranja">Não Iniciado</button>
                        </form>
                        <!-- formulario atualizar para concluido -->
                        <form action="{{route('update',['id'=>$t->id])}}" method="POST">
                            @method('put')
                            @csrf
                            <input type="hidden" name="updateTarefa" value="concluido" />
                            <button class="botao botaoVerde">Concluido</button>
                        </form>
                        <!-- formulario atualizar para excluir -->
                        <form action="{{route('delete',['id'=> $t->id])}}" method="POST">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="delete" value="delete" />
                            <button class="botao botaoVermelho">Excluir</button>
                        </form>
                        <!-- botao para abrir editar titulo da tarefa -->
                        <button id="abrirEditTTit{{$t->id}}" class="botao botaoAmarelo">Editar</button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<div class="divTarefas">
    <!-------------------- 
    ----CONCLUIDO 
    --------------------->
    <h3 class="concluido">Concluído</h3>
    <div class="areaTarefas">
        @if($concluido->count() == 0)
            <div class="tarefa t_concluido avisoTarefa">
                <small>Nenhuma tarefa concluída</small>
            </div>
        @else
            @foreach($concluido as $t)
                <input type="hidden" class="tarefaId" value="{{$t->id}}" />
                <div class="tarefa t_concluido">
                    <!-- dados da tarefa -->
                    <small>Atividade: {{$t->titulo}}</small><br />
                    <small>Data: {{$t->data_tarefa}}</small>
                    <div class="tarefaFormularios">    
                        <!-- formulario atualizar para nao iniciado -->
                        <form action="{{route('update',['id'=>$t->id])}}" method="POST">
                            @method('put')
                            @csrf
                            <input type="hidden" name="updateTarefa" value="naoIniciado" />
                            <button class="botao botaoLaranja">Não Iniciado</button>
                        </form>
                        <form action="{{route('update',['id'=>$t->id])}}" method="POST">
                            @method('put')
                            @csrf
                            <input type="hidden" name="updateTarefa" value="emAndamento" />
                            <button class="botao botaoAzul">Em andamanto</button>
                        </form>
                        <!-- formulario atualizar para excluir -->
                        <form action="{{route('delete',['id'=> $t->id])}}" method="POST">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="delete" value="delete" />
                            <button class="botao botaoVermelho">Excluir</button>
                        </form>
                        <!-- botao para abrir editar titulo da tarefa -->
                        <button id="abrirEditTTit{{$t->id}}" class="botao botaoAmarelo">Editar</button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
<div>
    @foreach($tarefas as $t)
        <div id="editarTarefaTitulo{{$t->id}}" class="editarTarefaTitulo">
            <h3 class="editTarefTitulo">Editar Tarefa</h3>
            <!-- formulario editar titulo da tarefa -->
            <form action="{{route('edit',['id'=>$t->id])}}" method="POST">
                @method('put')
                @csrf
                <input type="text" name="titulo" value="{{$t->titulo}}" />
                <button class="botao botaoAzul">Editar</button>
                <p id="fecharEditTTit{{$t->id}}" class="botao botaoVermelho" style="float: right; margin-right: 5px;">Cancelar</p>
            </form>
        </div>
    @endForeach
<div id="fundoOpaco" class="fundoOpaco"></div>
</div>
@endsection