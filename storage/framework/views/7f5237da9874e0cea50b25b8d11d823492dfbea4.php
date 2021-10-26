<!DOCTYPE html>
<?php
use App\Http\Controllers\UserController;
?>


<?php $__env->startSection('content'); ?>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<title>Eh Vegan? | Site de Pesquisa de Produto Vegano</title>
        <style>
            <?php include 'css/navbar.css'; ?>
            <?php include 'css/index.css'; ?>
        </style>
    </head>
    <body>
        <div class="logo_site">
			<center><a href="<?php echo e(url('/')); ?>">
			<img src="logo_ehvegan.png" alt="Site Eh Vegan?" width="700"></a></center>
        </div>
        <div class="nav_container">
            <!--<a class="nav_button button" href="<?php echo e(url('/pesquisa')); ?>">PESQUISA</a>
            <a class="nav_button button" href="<?php echo e(url('/cadastro')); ?>">CADASTRO</a>-->
			<a class="nav_button button" href="<?php echo e(url('/')); ?>">LOGIN ÁREA DE SUPORTE</a>
			<!--<a class="nav_button button" href="<?php echo e(url('/ong_login')); ?>">ONGS</a>
            <a class="nav_button button" href="<?php echo e(url('/sobre')); ?>">SOBRE</a>-->
			
        </div>
		<div class="main_container">
			<?php if(Auth::check()): ?>
				<center><h1>Bem-Vindo <?php echo e(Auth::user()->name); ?></h1></center>
			<?php else: ?>
			<br><br>
			<center>
				<form class="" action="<?php echo e(URL::to('/find_prod')); ?>" method="post">
				<table><tr><td style='width: 500px'>
				<input type="text" name="name" class="form-control" value="" placeholder="Pesquise o produto ou fabricante" required> </td><td style='padding: 5px'>
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
				<button id='pesquisa' type="submit" name="button" class="btn btn-primary btn-lg"><i class="bi-search"></i></button></td></tr></table>
			</form>
			</center>
			<br><br>
			<?php endif; ?>
		</div>
    </body>
</html>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Andrei\Pasta Andrei\UFRGS\2021.1\Interação Homem-Computador\trunk\resources\views/index.blade.php ENDPATH**/ ?>