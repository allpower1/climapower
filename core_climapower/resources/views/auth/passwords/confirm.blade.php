@extends('layouts.appsitioweb')

@section('cssadicionales')
<x-captcha-js />
@endsection

@section('content')
<div class="site-breadcrumb" style="padding-top:20px;padding-bottom:20px;">
	<div class="container" style="text-align: left;">
		<ul class="breadcrumb-menu">
			<li><a href="{{ url('/') }}">Home</a></li>
			<li><a href="{{ url('login') }}">Login</a></li>
			<li class="active">{{ __('Confirmar Password') }}</li>
		</ul>
	</div>
</div>
<div class="login-area py-5" style="background-image: url('{{ url('extras/images/AdobeStock_303397704.jpeg') }}'); background-size: 100%;">
    <div class="container">
        <div class="col-md-5 mx-auto">
            <div class="login-form">
                <div class="login-header">
                    <img src="{{ url('img/logoclimapower.png') }}" alt="">
                    <p>Confirmar password de tu cuenta TuLadoVIP.CL</p>
                    <p>{{ __('Por favor, confirme su contraseña antes de continuar.') }}</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('successactivacion'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        {{ session('successactivacion') }}
                    </div>
                @endif

                @if (session('msjerror'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('msjerror') }}
                    </div>
                @endif

                @if (Session::has('message'))
                    <div class="alert alert-info alert-dismissible fade show mb-0" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif

                @if ($errors->count() > 0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h4 style="color: red;">Error!</h4>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" class="theme-btn"><i class="far fa-sign-in"></i> {{ __('Confirmar Password') }}</button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="text-align: center;">
                            <br>
                            <x-captcha-container />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
@include('sitioweb.seccionvisitasycomparte')
@endsection
