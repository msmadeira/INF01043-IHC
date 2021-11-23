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
			/* <a class="nav_button button" href="{{url('/logout')}}">LOGOUT</a> */
        </div>
		<div class="main_container">
			@if(Auth::check())
				<center><h1 class="text-white">Bem-Vindo a área de suporte {{ Auth::user()->name }}</h1></center>
                <br><br>
                <center>
                    teste
                </center>
                <br><br>
            @else
                <br><br>
                <center class="text-white">
                    Usuário não logado
                </center>
                <br><br>
			@endif
		</div>
    </body>
</html>
