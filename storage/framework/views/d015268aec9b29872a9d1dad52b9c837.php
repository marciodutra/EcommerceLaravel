<?php $__env->startSection("scriptjs"); ?>
<script>
    $(function() {
        $(".infocompra").on('click', function() {
            let id = $(this).data("value"); // Corrigido para usar data() ao invés de attr()
            $.post('<?php echo e(route("compra_detalhes")); ?>', {
                idpedido: id,
                _token: '<?php echo e(csrf_token()); ?>' // Inclua o token CSRF
            }, function(result) {
                $("#conteudopedido").html(result);
            }).fail(function(xhr) {
                console.log(xhr.responseText);
            });
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection("conteudo"); ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<div class="col-12">
    <h2>Minhas compras</h2>
</div>

<div class="col-12">
    <table class="table table-bordered">
        <tr>
            <th>Data da compra</th>
            <th>Situação</th>
            <th></th>
        </tr>
        <?php $__currentLoopData = $lista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ped): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e((new DateTime($ped->datapedido))->format("d/m/Y H:i")); ?></td>
                <td><?php echo e($ped->statusDesc()); ?></td>
                <td>
                    <a href="#" class="btn btn-sm btn-info infocompra" data-value="<?php echo e($ped->id); ?>" data-toggle="modal" data-target="#modalcompra">
                        <i class="fas fa-shopping-basket"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</div>

<div class="modal fade" id="modalcompra">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes da compra</h5>
            </div>
            <div class="modal-body">
                <div id="conteudopedido"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\ecommerce\eccomerce\resources\views/compra/historico.blade.php ENDPATH**/ ?>