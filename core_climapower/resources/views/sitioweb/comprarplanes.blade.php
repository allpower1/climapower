@extends('layouts.appsitioweb')

@section('content')
<div class="site-breadcrumb" style="padding-top:20px;padding-bottom:20px;">
	<div class="container" style="text-align: left;">
		<ul class="breadcrumb-menu">
			<li><a href="{{ url('/') }}">Home</a></li>
			<li class="active">Comprar Planes</li>
		</ul>
	</div>
</div>
<div class="login-area py-5">
    <div class="container">
        <div class="col-md-12">
            <div class="login-form">

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
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-7">
                        <h6 style="margin: 5px;padding:0px;">Bienvenida(o) {{ Auth::user()->name }} {{ Auth::user()->last_name }}</h6>
                    </div>
                    <div class="col-5">
                        <a href="{{ url('/') }}" target="_blank">
                            <input type="button" class="theme-btn my-1" style="padding:.25rem .5rem;font-size: .71094rem;" value="Comprar Plan">
                        </a>
                    </div>
                    <div class="col-12">
                        <p>Al derivar a {{ url('/') }} verán precios, y opciones anuales, mensuales y oferta.</p>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <!-- planes masajistas -->
                    @if($listplanesmasajistasanual || $listplanesmasajistasmensual)
                    <div class="col-lg-12">
                        <p>Masajistas</p>
                    </div>
                    @if($listplanesmasajistasanual)
                    <div class="col-lg-6">
                        <h6 class="mb-3">Anual</h6>
                        <div class="profile-privacy-setting">
                            @foreach($listplanesmasajistasanual as $plan)
                            <div class="form-check form-switch">
                                <?php
                                    $disabledcheckbox = 'disabled';
                                    $checkedcheckbox = '';
                                ?>
                                <input class="form-check-input" name="adminplan" value="{{ $plan->id }}" type="checkbox" role="switch" id="adminplan_{{ $plan->id }}" onclick="activardesactivarplan({{ $plan->id }})" {{ $disabledcheckbox }} {{ $checkedcheckbox }} >
                                <label class="form-check-label" for="adminplan_{{ $plan->id }}">{{ $plan->nombre_plan }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if($listplanesmasajistasmensual)
                    <div class="col-lg-6">
                        <h6 class="mb-3">Mensual</h6>
                        <div class="profile-privacy-setting">
                            @foreach($listplanesmasajistasmensual as $plan)
                            <div class="form-check form-switch">
                                <?php
                                    $disabledcheckbox = 'disabled';
                                    $checkedcheckbox = '';
                                ?>
                                <input class="form-check-input" name="adminplan" value="{{ $plan->id }}" type="checkbox" role="switch" id="adminplan_{{ $plan->id }}" onclick="activardesactivarplan({{ $plan->id }})" {{ $disabledcheckbox }} {{ $checkedcheckbox }} >
                                <label class="form-check-label" for="adminplan_{{ $plan->id }}">{{ $plan->nombre_plan }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @endif
                    <!-- planes agencias -->
                    @if($listplanesagenciaanual)
                    <div class="col-lg-12">
                        <hr>
                        <p>Centros-Agencias</p>
                    </div>
                    <div class="col-lg-12">
                        <h6 class="mb-3">Anual</h6>
                        <div class="profile-privacy-setting">
                            @foreach($listplanesagenciaanual as $plan)
                            <div class="form-check form-switch">
                                <?php
                                    $disabledcheckbox = 'disabled';
                                    $checkedcheckbox = '';
                                ?>
                                <input class="form-check-input" name="adminplan" value="{{ $plan->id }}" type="checkbox" role="switch" id="adminplan_{{ $plan->id }}" onclick="activardesactivarplan({{ $plan->id }})" {{ $disabledcheckbox }} {{ $checkedcheckbox }} >
                                <label class="form-check-label" for="adminplan_{{ $plan->id }}">{{ $plan->nombre_plan }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <!-- planes publicidad -->
                    @if($listplanespublicidad)
                    <div class="col-lg-12">
                        <hr>
                        <p>Publicidad</p>
                    </div>
                    <div class="col-lg-12">
                        <div class="profile-privacy-setting">
                            @foreach($listplanespublicidad as $plan)
                            <div class="form-check form-switch">
                                <?php
                                    $disabledcheckbox = 'disabled';
                                    $checkedcheckbox = '';
                                ?>
                                <input class="form-check-input" name="adminplan" value="{{ $plan->id }}" type="checkbox" role="switch" id="adminplan_{{ $plan->id }}" onclick="activardesactivarplan({{ $plan->id }})" {{ $disabledcheckbox }} {{ $checkedcheckbox }} >
                                <label class="form-check-label" for="adminplan_{{ $plan->id }}">{{ $plan->nombre_plan }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-body">
                            <div style="text-align: center;">
                                <a href="{{ url('home') }}">
                                    <input type="button" class="btn btn-sm btn-primary" style="padding: 5px 10px !important;" value="Omitir">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

@include('sitioweb.seccionvisitasycomparte')
@endsection
