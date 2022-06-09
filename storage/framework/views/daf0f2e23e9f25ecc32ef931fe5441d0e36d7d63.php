<?php $__env->startSection('conteudo'); ?>
<h1 class="siteTitulo">Gerenciador De Tarefas</h1>
<form action="<?php echo e(route('store')); ?>" method="POST"x class="tarForm">
    <?php echo csrf_field(); ?>
    <input type="text" name="titulo" placeholder="Adicionar uma nova tarefa..." />
    <button type="submit">Adicionar</button>
</form>
<div class="areaBotaoTarefas">
    <?php if($nao_iniciado->count() > 0): ?>
        <form action="<?php echo e(route('deleteNInic')); ?>" method="POST">
            <?php echo method_field('delete'); ?>
            <button class="botao botaoLaranja botaoGrande">Excluir Tarefas Não Iniciadas</button>
        </form>
    <?php endif; ?>
    <?php if($em_andamento->count() > 0): ?>
        <form action="<?php echo e(route('deleteEmAnd')); ?>" method="POST">
            <?php echo method_field('delete'); ?>
            <button class="botao botaoAzul botaoGrande">Excluir Tarefas Em Andamento</button>
        </form>
    <?php endif; ?>
    <?php if($concluido->count() > 0): ?>
        <form action="<?php echo e(route('deleteConc')); ?>" method="POST">
            <?php echo method_field('delete'); ?>
            <button class="botao botaoVerde botaoGrande">Excluir Tarefas Concluídas</button>
        </form>
    <?php endif; ?>
    <?php if($tarefas->count() > 0): ?>
        <form action="<?php echo e(route('deleteAll')); ?>" method="POST">
            <?php echo method_field('delete'); ?>
            <button class="botao botaoVermelho botaoGrande">Excluir Todas As Tarefas</button>
        </form>
    <?php endif; ?>
</div>
<div class="divTarefas">
    <!-------------------- 
    ----NAO INICIADO 
    --------------------->
    <h3 class="nao_iniciado">Não iniciado</h3>
    <div class="areaTarefas">
        <?php if($nao_iniciado->count() == 0): ?>
            <div class="tarefa t_nao_iniciado avisoTarefa">
                <small>Nenhuma tarefa não iniciada</small>
            </div>
        <?php else: ?>
            <?php $__currentLoopData = $nao_iniciado; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" class="tarefaId" value="<?php echo e($t->id); ?>" />
                <div class="tarefa t_nao_iniciado">
                    <!-- dados da tarefa -->
                    <small>Atividade: <?php echo e($t->titulo); ?></small><br />
                    <small>Data: <?php echo e($t->data_tarefa); ?></small>
                    <div class="tarefaFormularios">
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
                            <button class="botao botaoVerde">Concluido</button>
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
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<div class="divTarefas">
    <!-------------------- 
    ----EM ANDAMENTO
    --------------------->
    <h3 class="em_andamento">Em andamento</h3>
    <div class="areaTarefas">
        <?php if($em_andamento->count() == 0): ?>
            <div class="tarefa t_em_andamento avisoTarefa">
                <small>Nenhuma tarefa em andamento</small>
            </div>
        <?php else: ?>
            <?php $__currentLoopData = $em_andamento; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" class="tarefaId" value="<?php echo e($t->id); ?>" />
                <div class="tarefa t_em_andamento">
                    <!-- dados da tarefa -->
                    <small>Atividade: <?php echo e($t->titulo); ?></small><br />
                    <small>Data: <?php echo e($t->data_tarefa); ?></small>
                    <div class="tarefaFormularios">
                        <!-- formulario atualizar para nao iniciado -->
                        <form action="<?php echo e(route('update',['id'=>$t->id])); ?>" method="POST">
                            <?php echo method_field('put'); ?>
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="updateTarefa" value="naoIniciado" />
                            <button class="botao botaoLaranja">Não Iniciado</button>
                        </form>
                        <!-- formulario atualizar para concluido -->
                        <form action="<?php echo e(route('update',['id'=>$t->id])); ?>" method="POST">
                            <?php echo method_field('put'); ?>
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="updateTarefa" value="concluido" />
                            <button class="botao botaoVerde">Concluido</button>
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
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<div class="divTarefas">
    <!-------------------- 
    ----CONCLUIDO 
    --------------------->
    <h3 class="concluido">Concluído</h3>
    <div class="areaTarefas">
        <?php if($concluido->count() == 0): ?>
            <div class="tarefa t_concluido avisoTarefa">
                <small>Nenhuma tarefa concluída</small>
            </div>
        <?php else: ?>
            <?php $__currentLoopData = $concluido; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="hidden" class="tarefaId" value="<?php echo e($t->id); ?>" />
                <div class="tarefa t_concluido">
                    <!-- dados da tarefa -->
                    <small>Atividade: <?php echo e($t->titulo); ?></small><br />
                    <small>Data: <?php echo e($t->data_tarefa); ?></small>
                    <div class="tarefaFormularios">    
                        <!-- formulario atualizar para nao iniciado -->
                        <form action="<?php echo e(route('update',['id'=>$t->id])); ?>" method="POST">
                            <?php echo method_field('put'); ?>
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="updateTarefa" value="naoIniciado" />
                            <button class="botao botaoLaranja">Não Iniciado</button>
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
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<div>
    <?php $__currentLoopData = $tarefas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div id="fundoOpaco" class="fundoOpaco"></div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/schmoetropin/Documents/laravelWorkspace/teste-main/resources/views/tarefas/index.blade.php ENDPATH**/ ?>