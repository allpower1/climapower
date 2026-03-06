@extends('layouts.auth')

@section('content')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="card-body pt-0">
                        <div style="text-align: center;">
                            <a href="{{ url('/') }}">
                                <img src="{{ url('img/logoclimapower.png') }}" alt="" width="150" height="20">
                            </a>
                            <br>
                            <p>Verifique su dirección de correo electrónico</p>
                            <p>Antes de continuar, revise su correo electrónico para obtener un enlace de verificación.</p>
                        </div>
                        <div class="p-2">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.
                                </div>
                            @endif

                            Si no recibió el correo electrónico
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-link p-0 m-0 align-baseline">Haga clic aquí para solicitar otro</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
