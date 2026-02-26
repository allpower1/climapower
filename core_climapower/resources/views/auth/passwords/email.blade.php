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
                                <img src="{{ url('img/logoclimapower.png') }}" style="margin: 30px;" alt="" height="50">
                            </a>
                            <br>
                            <h5>Restaurar password de tu cuenta</h5>
                        </div>
                        <div class="p-2">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

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

                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="d-flex align-items-center">
                                    <br><br><br>
                                    <button type="submit" class="btn btn-primary"><i class="far fa-sign-in"></i> {{ __('Enviar Link Restauración Password') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
