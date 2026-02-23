@extends('layouts.auth')

@section('content')
<x-captcha-js />
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <div style="text-align: center;">
                                <a href="{{ url('/') }}">
                                    <img src="{{ url('files/images/logo-tuladovip-negro.png') }}" style="margin: 30px;" alt="" height="50">
                                </a>
                                <br>
                                <h5>Accede a tu cuenta</h5>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('loginadmin') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>¡Ups!</strong> Hubo problemas con la entrada:
                                        <br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Correo Electrónico</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Ingrese un correo electronico">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Contraseña</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Ingresar contraseña" aria-label="Contraseña" aria-describedby="password-addon" autocomplete="current-password">
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                        <label class="form-check-label" for="remember-check">
                                            No cerrar sesión
                                        </label>
                                    </div>
                                    <div class="mt-3 d-grid">
                                        <button style="background-color:#0d00d0" class="btn btn-primary waves-effect waves-light" type="submit">INGRESAR</button>
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
                                    <div class="mt-4 text-center"></div>
                                    <div class="mt-4 text-center">
                                        <hr>
                                        <a href="#" class="text-muted">Copyright &copy; <?php echo date('Y'); ?> {{ trans('global.global_title') }}. Todos los derechos reservados.</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
