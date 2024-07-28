<?php $__env->startSection("scriptjs"); ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
   $(function(){
    $("#cpf").mask("000.000.000-00")    
}) 
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("conteudo"); ?>

<div class="col-12">
    <h2 class="mb-3">Logar no sistema</h2>

    <form action="<?php echo e(route('logar')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            Login:
            <input type="text" name="login" class="form-control" id="cpf" />
        </div>

        <div class="form-group">
            Senha:
            <input type="password" name="senha" class="form-control" />
        </div>
        <input type="submit" value="Logar" class="btn btn-lg btn-primary">
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\ecommerce\eccomerce\resources\views/logar.blade.php ENDPATH**/ ?>