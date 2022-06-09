<?php $__env->startSection('conteudo'); ?>
<h1 class="siteTitulo">Tarefas</h1>
<form action="<?php echo e(route('store')); ?>" method="POST"x class="tarForm">
    <?php echo csrf_field(); ?>
    <input type="text" name="titulo" placeholder="Adicionar uma nova tarefa..." />
    <button type="submit">Adicionar</button>
</form>
<div class="divTarefas">
    <!-------------------- 
    ----NAO INICIADO 
    --------------------->
    <h3 class="nao_iniciado">Não iniciado</h3>
    <div class="areaTarefas">
        <?php $__currentLoopData = $tarefas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($t->nao_iniciado == 1): ?>
            <input type="hidden" class="tarefaId" value="<?php echo e($t->id); ?>" />
            <div class="tarefa t_nao_iniciado">
                <!-- dados da tarefa -->
                <small>Atividade: <?php echo e($t->titulo); ?></small><br />
                <small>Data: <?php echo e($t->data_tarefa); ?></small>
                <!-- formulario atualizar para em andamento -->
                <form action="<?php echo e(route('update',['id'=>$t->id])); ?>" method="POST">
                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="updateTarefa" value="emAndamento" />
                    <button class="botao botaoAzul">Em andamanto</button>
                </form>
                <!-- formulario atualizar para concluido -->
                <form action="<?php echo e(route('update',['id'=>$t->id])); ?>" method="POST">
                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="updateTarefa" value="concluido" />
                    <button class="botao botaoAzul">Concluido</button>
                </form>
                <!-- formulario atualizar para excluir -->
                <form action="<?php echo e(route('delete',['id'=> $t->id])); ?>" method="POST">
                    <?php echo method_field('delete'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="delete" value="delete" />
                    <button class="botao botaoVermelho">Excluir</button>
                </form>
                <!-- botao para abrir editar titulo da tarefa -->
                <button id="abrirEditTTit<?php echo e($t->id); ?>" class="botao botaoAmarelo">Editar</button>
            </div>
            <div id="editarTarefaTitulo<?php echo e($t->id); ?>" class="editarTarefaTitulo">
                <h3 class="editTarefTitulo">Editar Tarefa</h3>
                <!-- formulario editar titulo da tarefa -->
                <form action="<?php echo e(route('edit',['id'=>$t->id])); ?>" method="POST">
                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="text" name="titulo" value="<?php echo e($t->titulo); ?>" />
                    <button class="botao botaoAzul">Editar</button>
                    <p id="fecharEditTTit<?php echo e($t->id); ?>" class="botao botaoVermelho" style="float: right; margin-right: 5px;">Cancelar</p>
                </form>
            </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<div class="divTarefas">
    <!-------------------- 
    ----EM ANDAMENTO
    --------------------->
    <h3 class="em_andamento">Em andamento</h3>
    <div class="areaTarefas">
        <?php $__currentLoopData = $tarefas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($t->em_andamento == 1): ?>
            <input type="hidden" class="tarefaId" value="<?php echo e($t->id); ?>" />
            <div class="tarefa t_em_andamento">
                <!-- dados da tarefa -->
                <small>Atividade: <?php echo e($t->titulo); ?></small><br />
                <small>Data: <?php echo e($t->data_tarefa); ?></small>
                <!-- formulario atualizar para nao iniciado -->
                <form action="<?php echo e(route('update',['id'=>$t->id])); ?>" method="POST">
                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="updateTarefa" value="naoIniciado" />
                    <button class="botao botaoAzul">Não Iniciado</button>
                </form>
                <!-- formulario atualizar para concluido -->
                <form action="<?php echo e(route('update',['id'=>$t->id])); ?>" method="POST">
                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="updateTarefa" value="concluido" />
                    <button class="botao botaoAzul">Concluido</button>
                </form>
                <!-- formulario atualizar para excluir -->
                <form action="<?php echo e(route('delete',['id'=> $t->id])); ?>" method="POST">
                    <?php echo method_field('delete'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="delete" value="delete" />
                    <button class="botao botaoVermelho">Excluir</button>
                </form>
                <!-- botao para abrir editar titulo da tarefa -->
                <button id="abrirEditTTit<?php echo e($t->id); ?>" class="botao botaoAmarelo">Editar</button>
            </div>
            <div id="editarTarefaTitulo<?php echo e($t->id); ?>" class="editarTarefaTitulo">
                <h3>Editar Tarefa</h3>
                <!-- formulario editar titulo da tarefa -->
                <form action="<?php echo e(route('edit',['id'=>$t->id])); ?>" method="POST">
                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="text" name="titulo" value="<?php echo e($t->titulo); ?>" />
                    <button class="botao botaoAzul">Editar</button>
                    <p id="fecharEditTTit<?php echo e($t->id); ?>" class="botao botaoVermelho" style="float: right; margin-right: 5px;">Cancelar</p>
                </form>
            </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<div class="divTarefas">
    <!-------------------- 
    ----CONCLUIDO 
    --------------------->
    <h3 class="concluido">Concluído</h3>
    <div class="areaTarefas">
        <?php $__currentLoopData = $tarefas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($t->concluido == 1): ?>
            <input type="hidden" class="tarefaId" value="<?php echo e($t->id); ?>" />
            <div class="tarefa t_concluido">
                <!-- dados da tarefa -->
                <small>Atividade: <?php echo e($t->titulo); ?></small><br />
                <small>Data: <?php echo e($t->data_tarefa); ?></small>
                <!-- formulario atualizar para nao iniciado -->
                <form action="<?php echo e(route('update',['id'=>$t->id])); ?>" method="POST">
                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="updateTarefa" value="naoIniciado" />
                    <button class="botao botaoAzul">Não Iniciado</button>
                </form>
                <form action="<?php echo e(route('update',['id'=>$t->id])); ?>" method="POST">
                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="updateTarefa" value="emAndamento" />
                    <button class="botao botaoAzul">Em andamanto</button>
                </form>
                <!-- formulario atualizar para excluir -->
                <form action="<?php echo e(route('delete',['id'=> $t->id])); ?>" method="POST">
                    <?php echo method_field('delete'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="delete" value="delete" />
                    <button class="botao botaoVermelho">Excluir</button>
                </form>
                <!-- botao para abrir editar titulo da tarefa -->
                <button id="abrirEditTTit<?php echo e($t->id); ?>" class="botao botaoAmarelo">Editar</button>
            </div>
            <div id="editarTarefaTitulo<?php echo e($t->id); ?>" class="editarTarefaTitulo">
                <h3>Editar Tarefa</h3>
                <!-- formulario editar titulo da tarefa -->
                <form action="<?php echo e(route('edit',['id'=>$t->id])); ?>" method="POST">
                    <?php echo method_field('put'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="text" name="titulo" value="<?php echo e($t->titulo); ?>" />
                    <button class="botao botaoAzul">Editar</button>
                    <p id="fecharEditTTit<?php echo e($t->id); ?>" class="botao botaoVermelho" style="float: right; margin-right: 5px;">Cancelar</p>
                </form>
            </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<div id="fundoOpaco" class="fundoOpaco"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/schmoetropin/Documents/laravelWorkspace/testeFullStack/resources/views/tarefas/index.blade.php ENDPATH**/ ?>