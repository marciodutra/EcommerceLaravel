<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MD Shop - Ecommerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6d7a6fa96f.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php echo $__env->yieldContent("scriptjs"); ?>
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
        <a href="#" class="navbar-brand">MD Shop</a>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                <a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a>
                <a class="nav-link" href="<?php echo e(route('categoria')); ?>">Categorias</a>
                <a class="nav-link" href="<?php echo e(route('cadastrar')); ?>">Cadastrar</a>
                <?php if(!\Auth::user()): ?>
                    <a class="nav-link" href="<?php echo e(route('logar')); ?>">Logar</a>
                    <?php else: ?>
                    <a class="nav-link" href="<?php echo e(route('compra_historico')); ?>">Minhas compras</a>
                    <a class="nav-link" href="<?php echo e(route('sair')); ?>">Logout</a>
                <?php endif; ?>
            </div>
        </div>
        <a href="<?php echo e(route('ver_carrinho')); ?>" class="btn btn-sm"><i class="fa -solid fa-cart-shopping" aria-hidden="true"></i></a>
    </nav>

    <div class="container">
        <div class="row">
            
            <?php if(\Auth::user()): ?>
                <div class="col-12">
                    <p class="text-right">Seja bem vindo, <?php echo e(\Auth::user()->nome); ?>, <a href="<?php echo e(route('sair')); ?>">Sair</a></p>
                </div>
            <?php endif; ?>

            <?php if($message = Session::get("err")): ?>
              <div class="col-12">
                <div class="alert alert-danger"><?php echo e($message); ?></div>
              </div>
            <?php endif; ?>

            <?php if($message = Session::get("ok")): ?>
              <div class="col-12">
                <div class="alert alert-success"><?php echo e($message); ?></div>
              </div>
            <?php endif; ?>
            <?php echo $__env->yieldContent("conteudo"); ?>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Projetos\ecommerce\eccomerce\resources\views/layout.blade.php ENDPATH**/ ?>