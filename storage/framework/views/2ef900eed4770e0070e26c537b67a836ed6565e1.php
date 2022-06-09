<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tarefas</title>
        <link rel="stylesheet" href="<?php echo e(url('css/style.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(url('css/resolucoes/max-width-1120.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(url('css/resolucoes/max-width-995.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(url('css/resolucoes/max-width-850.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(url('css/resolucoes/max-width-765.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(url('css/resolucoes/max-width-615.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(url('css/resolucoes/max-width-500.css')); ?>" />
    </head>
    <body>
        <div class="siteConteudo">
            <?php echo $__env->yieldContent('conteudo'); ?>
        </div>
        <script src="<?php echo e(url('js/script.js')); ?>"></script>
    </body>
</html>
<?php /**PATH /home/schmoetropin/Documents/laravelWorkspace/teste-main/resources/views/layout.blade.php ENDPATH**/ ?>