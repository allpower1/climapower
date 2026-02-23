@extends('layouts.appsitioweb')

@section('cssadicionales')
<x-captcha-js />
<style>
    .password-section {
        width: 100%;
        position: relative;
        display: inline-block;
    }

    .password-section .fa-eye {
        position: absolute;
        top: 76%;
        right: 22px;
        transform: translateY(-50%);
        cursor: pointer;
    }
    .password-section .fa-eye-slash {
        position: absolute;
        top: 76%;
        right: 22px;
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>
@endsection
@section('javascript')
<script>
    $("#imgContrasena").click(function () {
        var control = $(this);
        var estatus = control.data('activo');
        if (estatus == false) {
            control.data('activo', true);
            $(this).removeClass('fa-eye').addClass('fa-eye-slash');
            $("#password").attr('type', 'text');
            $("#password-confirm").attr('type', 'text');
        }else {
            control.data('activo', false);
            $(this).removeClass('fa-eye-slash').addClass('fa-eye');
            $("#password").attr('type', 'password');
            $("#password-confirm").attr('type', 'password');
        }
    });
</script>
@endsection

@section('content')
<div class="site-breadcrumb" style="padding-top:20px;padding-bottom:20px;">
	<div class="container" style="text-align: left;">
		<ul class="breadcrumb-menu">
			<li><a href="{{ url('/') }}">Home</a></li>
			<li class="active">Login</li>
		</ul>
	</div>
</div>
<div class="login-area py-5" style="background-image: url('{{ url('extras/images/AdobeStock_303397704.jpeg') }}'); background-size: 100%;">
    <div class="container">
        <div class="col-md-5 mx-auto">
            <div class="login-form">
                <div class="login-header">
                    <a href="{{ url('/') }}">
                        <img src="{{ url('files/images/logo-tuladovip-negro.png') }}" alt="">
                    </a>
                    <p>Login con tu cuenta TuLadoVIP.CL</p>
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

                <form method="POST" action="{{ route('loginuser') }}">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" style="width: 100%;" required autocomplete="email">
                    </div>
                    <div class="form-group password-section">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Tu Password" name="password" style="width: 100%;" required autocomplete="new-password">
                        <span id="imgContrasena" data-activo="false" class="fa fa-eye"></span>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="remember">
                            <label class="form-check-label" for="remember">
                                Recordarme
                            </label>
                        </div>
                        <a href="{{ url('password/reset') }}" class="forgot-pass">Olvidaste la contraseña?</a>
                    </div>
                    <div class="d-flex align-items-center">
                        <button type="submit" class="theme-btn"><i class="far fa-sign-in"></i> Login</button>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="text-align:right">
                            <br>
                            <x-captcha-container />
                        </div>
                    </div>
                </form>
                <div class="login-footer">
                    <p>¿No tienes una cuenta? <a href="{{ url('registro') }}">Registrate</a></p>
                    <!--
                    <div class="social-login">
                        <p>Continue with social media</p>
                        <div class="social-login-list">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-google"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@include('sitioweb.seccionvisitasycomparte')
@endsection
