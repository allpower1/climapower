@extends('layouts.appsitioweb')

@section('cssadicionales')
<x-captcha-js />
@endsection

@section('content')
<div class="site-breadcrumb" style="padding-top:20px;padding-bottom:20px;">
	<div class="container" style="text-align: left;">
		<ul class="breadcrumb-menu">
			<li><a href="{{ url('/') }}">Home</a></li>
			<li><a href="{{ url('/login') }}">Login</a></li>
			<li class="active">{{ __('Restaurar Password') }}</li>
		</ul>
	</div>
</div>
<div class="login-area py-5" style="background-image: url('{{ url('extras/images/AdobeStock_303397704.jpeg') }}'); background-size: 100%;">
    <div class="container">
        <div class="col-md-5 mx-auto">
            <div class="login-form">
                <div class="login-header">
                    <img src="{{ url('files/images/logo-tuladovip-negro.png') }}" alt="">
                    <p>Restaura password de tu cuenta TuLadoVIP.CL</p>
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

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Confirmar Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" class="theme-btn"><i class="far fa-sign-in"></i> {{ __('Restaurar Password') }}</button>
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
