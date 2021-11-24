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
		<title>Eh Vegan? | Site de Pesquisa de Produtos Veganos</title>
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
        <div class="nav_container" style="justify-content: right; font-size: 9px">
			@if(Auth::check())
				<a class="nav_button button" href="{{url('/suporte')}}"><strong>LOGIN ÁREA DE SUPORTE</strong></a>
			@else
				<a class="nav_button button" href="{{url('/login')}}"><strong>LOGIN ÁREA DE SUPORTE</strong></a>
			@endif

        </div>
		<div class="main_container">
			<br><br>
			<center>
				<form class="" action="{{URL::to('/find_prod')}}" method="post">
                    <table><tr><td style='width: 500px'>
                    <input type="text" name="name" class="form-control" value="" placeholder="Pesquise o produto ou fabricante" required> </td><td style='padding: 5px'>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button id='pesquisa' type="submit" name="button" class="btn btn-primary btn-lg"><i class="bi-search"></i></button></td></tr>
					<tr><td style="font-size: 11px; color: #EAEAEA"><strong>DICA:</strong> Digite # para mostrar todos os produtos diponíveis.</td></tr></table>
                </form>
			</center>
			<br><br>
		</div>
    </body>
</html>
