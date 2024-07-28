<table class="table table-bordered">
    <tr>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Valor</th>
    </tr>
    <?php $__currentLoopData = $listaItens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <tr>
           <td><?php echo e($item->nome); ?></td>
           <td><?php echo e($item->quantidade); ?></td>
           <td><?php echo e($item->valoritem); ?></td> 
       </tr> 
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table><?php /**PATH C:\Projetos\ecommerce\eccomerce\resources\views/compra/detalhes.blade.php ENDPATH**/ ?>