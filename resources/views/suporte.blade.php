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
		<title>Eh Vegan? | Área do Suporte</title>
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
			@if(Auth::check())
				<a class="nav_button button">Bem-Vindo(a) {{ Auth::user()->name }}</a>
				<a class="nav_button button" href="{{url('/registro')}}">Cadastrar Usuário</a>
				<a class="nav_button button" href="{{url('/logout')}}">LOGOUT</a>
			@else
				<a class="nav_button button" href="{{url('/')}}">VOLTAR</a>
			@endif
			
        </div>
		<div class="main_container">
			@if(Auth::check())
				@if(sizeof($produtos) != 0)
				<br><center><a id="nova_pesquisa" class="nav_button button" onclick="return confirm('Esta ação excluirá todos os produtos que já constam publicados no site. Deseja continuar?');" href="{{url('/validacao')}}">Fazer validação</a></center><br>
				@foreach($produtos as $produto)
				<div style="margin: 20px; padding: 10px; border-radius: 5px; font-size: 25px; background-color: green">
					<table style="width: 100%"><tr><td style="padding-right: 20px">
					@if(!empty($produto->foto))
						<img src="data:image/jpg;base64,{{$produto->foto}}" style="max-height: 150px; border-radius: 5px"/>
					@endif
					@if(empty($produto->foto))
						<img src="no_image.jpg" style="max-width: 150px; border-radius: 5px"/>
					@endif
					<p><center><a style="font-size: 20px" id="nova_pesquisa" class="nav_button button" onclick="return confirm('Esta ação publica este produto no site. Deseja continuar?');" href="{{url('/addProduto', ['id' => $produto->id])}}"><i class="glyphicon glyphicon-floppy-disk"></i></a>
					<a style="font-size: 20px" id="nova_pesquisa" class="nav_button button" onclick="return confirm('Deseja excluir este produto?');" href="{{url('/delProduto', ['id' => $produto->id])}}"><i class="bi-trash"></i></a></center></p></td>
					<td style="width: 100%">
						<div style="background-color: #EAEAEA; padding: 23px; border-radius: 5px">
							<strong>Nome:</strong> {{$produto->nome}} <br>
							<strong>Fabricante:</strong> {{$produto->fabricante}} <br>
							<strong>Ingredientes:</strong> {{$produto->ingredientes}} <br>
							<strong>Email do solicitante:</strong> {{$produto->email}} <br>
							<strong>Data da solicitação:</strong> {{$produto->created_at->format('d/m/Y')}} <br>
						</div>
					</td></tr></table>
				</div>
				@endforeach
			@else
				<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: green">
					<center>
					<div style="background-color: #EAEAEA; border-radius: 5px"><br>
					<table><tr><td style='padding-right: 50px'>
					<img src="check_icon.png" style="max-width: 90px"/></td>
					</td><td>
					<h2><strong>Parabéns, não há produtos para revisão!</strong></h2>
					</td></tr></table><br>
					</div>
					</center>
				</div>
			@endif
		@else
                <div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: green">
					<center>
					<div style="background-color: #EAEAEA; border-radius: 5px"><br>
					<table><tr><td style='padding-right: 50px'>
					<img src="proibido_icon.png" style="max-width: 90px"/></td>
					</td><td>
					<h2><strong>Você não tem permissão de acesso a esta área!</strong></h2>
					</td></tr></table><br>
					</div>
					</center>
				</div>
		@endif
		</div>
    </body>
</html>