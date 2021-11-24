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
		<title>Eh Vegan? | Login Área do Suporte</title>
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
			<a class="nav_button button" href="{{url('/')}}">VOLTAR</a>
        </div>
		<div class="main_container">
<div class="page-content">
    <div class="row justify-content-center">
        <div class="col-md-4 col-md-offset-4">
            <div class="card">
                <h3 class="text-bold text-center">{{ __('Login para Área do Suporte') }}</h3>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" style="padding: 20px">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="text-md-right">{{ __('E-mail:') }}</label>

                            <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-md-right">{{ __('Senha:') }}</label>

                            <input id="password" placeholder="Senha" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Lembrar') }}
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
								<!--<br><br>
                                @if (Route::has('password.request'))
                                    
									<a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu sua senha?') }}
                                    </a>
                                @endif-->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
		</div>
    </body>
</html>
