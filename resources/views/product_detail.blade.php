<!DOCTYPE html>
<?php
use App\Http\Controllers\UserController;
?>
@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
			<center><a href="{{ url('/') }}">
			<img src="logo_ehvegan.png" alt="Site Eh Vegan?" width="700"></a></center>
        </div>
        <div class="nav_container">
            <!--<a class="nav_button button" href="{{ url('/pesquisa') }}">PESQUISA</a>
            <a class="nav_button button" href="{{ url('/cadastro') }}">CADASTRO</a>-->
			<a class="nav_button button" href="{{url('/')}}">LOGIN ÁREA DE SUPORTE</a>
			<!--<a class="nav_button button" href="{{url('/ong_login')}}">ONGS</a>
            <a class="nav_button button" href="{{ url('/sobre') }}">SOBRE</a>-->
			
        </div>
		<div class="main_container">
			@if(sizeof($produtos) != 0)
				@foreach($produtos as $produto)
				<div style="margin: 20px; padding: 10px; border-radius: 5px; font-size: 25px; background-color: green">
					<table><tr><td>
					@if(!empty($produto->foto))
						<img src="data:image/jpg;base64,{{$produto->foto}}" style="max-height: 150px; border-radius: 5px"/></td>
					@endif
					@if(empty($produto->foto))
						<img src="no_image.jpg" style="max-width: 150px; border-radius: 5px"/></td>
					@endif
					<td style="padding-left: 30px">
						<div style="background-color: #EAEAEA; padding: 23px; width: 1245px; border-radius: 5px">
							<strong>Nome:</strong> {{$produto->nome}} <br>
							<strong>Fabricante:</strong> {{$produto->fabricante}} <br>
							<strong>Ingredientes:</strong> {{$produto->ingredientes}} <br>
						</div>
					</td></tr></table>
				</div>
				@endforeach
			@else
				<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: green">
					<center>
					<div style="background-color: #EAEAEA; border-radius: 5px"><br>
					<table><tr><td style='padding-right: 50px'>
					<img src="sad_smile.png" style="max-width: 150px"/></td>
					</td><td>
					<h2><strong>Desculpe, não foi possível encontrar o produto, portanto não garantimos que seja vegano.</strong></h2>
					<h3><strong>Gostaria de saber se é vegano? Cadastre o produto no formulário abaixo para passar por nossa revisão!</strong></h3><br>
					</td></tr></table>
					</div><br><br>
					
					<form action="{{URL::to('/store')}}" method="post" enctype="multipart/form-data" style="background-color: #EAEAEA; border-radius: 5px; width: 500px">
						<br><h3><strong>Cadastrar Produto</strong></h3>
						<table><tr><td style='padding: 10px'>
						<strong>Nome: </strong><input type="text" name="nome" class=form-control required></td></tr><tr><td style='padding: 10px'>
						<strong>Fabricante: </strong><input type="text" name="fabricante" class=form-control required></td></tr><tr><td style='padding: 10px'>
						<strong>Ingredientes: </strong><textarea type="textarea" name="ingredientes" rows="4" cols="50" class=form-control required></textarea></td></tr><tr><td style='padding: 10px'>
						<strong>E-mail: </strong><input type="email" name="email" class=form-control required></td></tr><tr><td style='padding: 10px'>
						<input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
						<strong>Submeta uma foto do produto:</strong>
						<input type="file" id="foto" name="foto"></td></tr><tr><td style='padding: 10px'>
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<br><button type="submit" name="button" class="btn btn-primary btn-md">Cadastrar Produto</button></td></tr></table><br>
					</form>
					</center><br>
				</div>
			@endif
			<br><center><a id="nova_pesquisa" class="nav_button button" href="{{url('/')}}">Fazer nova pesquisa</a></center><br>
		</div>
    </body>
</html>