const TodosIds = document.querySelectorAll('.tarefaId'); // todos os ids das tarefas
const FundoOpaco = document.getElementById('fundoOpaco');

// script para abrie e fechar a edicao da tarefa
TodosIds.forEach((valores)=>{
    let valor = valores.value;
    document.getElementById('abrirEditTTit'+valor).addEventListener('click',()=>{
        document.getElementById('editarTarefaTitulo'+valor).style.display = 'block';
        FundoOpaco.style.display = 'block';
    });

    document.getElementById('fecharEditTTit'+valor).addEventListener('click',()=>{
        document.getElementById('editarTarefaTitulo'+valor).style.display = 'none';
        FundoOpaco.style.display = 'none';
    });
});