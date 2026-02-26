@extends('layouts.appsitioweb')

@section('content')
<div class="site-breadcrumb" style="padding-top:20px;padding-bottom:20px;">
	<div class="container" style="text-align: left;">
		<ul class="breadcrumb-menu">
			<li><a href="{{ url('/') }}">Home</a></li>
			<li class="active">Verifique su dirección de correo electrónico</li>
		</ul>
	</div>
</div>
<div class="login-area py-5" style="background-image: url('{{ url('extras/images/AdobeStock_303397704.jpeg') }}'); background-size: 100%;">
    <div class="container">
        <div class="col-md-5 mx-auto">
            <div class="login-form">
                <div class="login-header">
                    <img src="{{ url('img/logoclimapower.png') }}" alt="">
                    <p>Verifique su dirección de correo electrónico TuLadoVIP.CL</p>
                    <p>Antes de continuar, revise su correo electrónico para obtener un enlace de verificación.</p>
                </div>

                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.
                    </div>
                @endif

                Si no recibió el correo electrónico
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Haga clic aquí para solicitar otro</button>.
                </form>
            </div>
        </div>
    </div>
</div>
<br>
@include('sitioweb.seccionvisitasycomparte')
@endsection
