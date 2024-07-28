<?php $__env->startSection("scriptjs"); ?>
<script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection("conteudo"); ?>

<form>
    <input type="hidden" name="hashseller" class="hashseller">
    <div class="row">
        <div class="col-4">
            Cartão de crédito:
            <input type="text" name="ncredito" class="ncredito form-control" />
        </div>
        <div class="col-4">
            CVV:
            <input type="text" name="ncvv" class="ncvv form-control" />
        </div>
        <div class="col-4">
            Mês de expiração:
            <input type="text" name="mesexp" class="mesexp form-control" />
        </div>
        <div class="col-4">
            Ano de expiração:
            <input type="text" name="anoexp" class="anoexp form-control" />
        </div>
        <div class="col-4">
            Nome no cartão:
            <input type="text" name="nomecartao" class="nomecartao form-control" />
        </div>
        <div class="col-4">
            Parcelas:
            <input type="text" name="nparcela" class="nparcela form-control" />
        </div>
        <div class="col-4">
            Valor total:
            <input type="text" name="totalfinal" class="totalfinal form-control" />
        </div>
        <div class="col-4">
            Valor da parcela:
            <input type="text" name="totalparcela" class="totalparcela form-control" />
        </div>
        <?php echo csrf_field(); ?>
    </div>
    <input type="button" value="pagar" class="btn btn-lg btn-success pagar" />
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\ecommerce\eccomerce\resources\views/compra/pagar.blade.php ENDPATH**/ ?>