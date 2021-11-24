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
		<title>Eh Vegan? | Cadastro de Usu&aacute;rio</title>
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
				<a class="nav_button button" href="{{url('/suporte')}}">VOLTAR</a>
			@else
				<a class="nav_button button" href="{{url('/')}}">VOLTAR</a>
			@endif
        </div>
		<div class="main_container">
		@if(Auth::check())
<div class="page-content">
    <div class="row justify-content-center">
        <div class="col-md-4 col-md-offset-4">
            <div class="card">
                <h3 class="text-bold text-center">{{ __('Cadastro') }}</h3>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" style="padding: 20px">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="text-md-right">{{ __('Nome: *') }}</label><br>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="text-md-right">{{ __('E-mail: *') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

						<div class="form-group">
                            <label for="address" class="text-md-right">{{ __('Endereco: *') }}</label>

                            <input id="address" type="text" class="form-control" name="address" required autocomplete="address">
						</div>
						
						<div class="form-group">
                            <label for="phone" class="text-md-right">{{ __('Telefone: *') }}</label>

                            <input id="phone" type="text" class="form-control" name="phone" required autocomplete="phone">
						</div>

                        <div class="form-group">
                            <label for="password" class="text-md-right">{{ __('Senha: *') }}</label>

                             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="text-md-right">{{ __('Confirmar Senha: *') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <div><br>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
		@else
				<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: green">
					<center>
					<div style="background-color: #EAEAEA; border-radius: 5px"><br>
					<table><tr><td style='padding-right: 50px'>
					<img src="proibido_icon.png" style="max-width: 90px"/></td>
					</td><td>
					<h2><strong>Voc&ecirc; n&atilde;o tem permiss&atilde;o de acesso a esta &aacute;rea!</strong></h2>
					</td></tr></table><br>
					</div>
					</center>
				</div>
		@endif

		</div>
    </body>
</html>
