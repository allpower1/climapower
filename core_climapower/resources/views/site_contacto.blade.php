@extends('layouts.appsitioweb')

@section('content')
<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
				<h1>- Contáctanos</h1>
				<span class="d-block text-4">Envíanos un mensaje o llámanos</span>
			</div>
			<div class="col-md-4 order-1 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-end breadcrumb-light">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li class="active">Contacto</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div class="row pt-1 pb-4 mb-3">
		<div class="col-lg-8">

			<h2 class="font-weight-bold text-color-dark">- Envíanos un mensaje</h2>

			<form class="custom-contact-form-style-1" action="{{ url('enviar_contacto') }}" method="POST">
				@csrf

				@include('partials.alerts')

				<div class="row">
					<div class="form-group col">
						<div class="custom-input-box">
							<i class="icon-check icons text-color-primary"></i>
							<select name="subject" class="form-control" required>
								<option value="">Seleccione asunto</option>
								<option value="Contacto">Contacto</option>
								<option value="Garantía">Garantía</option>
								<option value="Felicitaciones">Felicitaciones</option>
								<option value="Reclamos">Reclamos</option>
								<option value="Otros">Otros</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col">
						<div class="custom-input-box">
							<i class="icon-user icons text-color-primary"></i>
							<input type="text" placeholder="Nombre completo*" value="{{ old('nombre_completo') }}" data-msg-required="Por favor ingresa tu nombre." maxlength="100" class="form-control" name="nombre_completo" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col">
						<div class="custom-input-box">
							<i class="icon-envelope icons text-color-primary"></i>
							<input type="email" placeholder="Correo electrónico*" value="{{ old('email') }}" data-msg-required="Por favor ingresa tu correo electrónico." data-msg-email="Por favor ingresa un email válido." maxlength="100" class="form-control" name="email" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col">
						<div class="custom-input-box">
							<i class="icon-bubble icons text-color-primary"></i>
							<textarea maxlength="5000" data-msg-required="Por favor ingresa tu mensaje." rows="10" class="form-control" name="mensaje" placeholder="¿Cómo podemos ayudarte? No dudes en contactarnos.!*" required>{{ old('mensaje') }}</textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-8">
						<x-captcha-container />
					</div>
					<div class="form-group col-4">
						<input type="submit" value="Enviar Ahora" class="btn btn-outline custom-border-width btn-primary custom-border-radius font-weight-semibold text-uppercase mb-4" data-loading-text="Cargando...">
					</div>
				</div>
			</form>
		</div>
		<div class="col-lg-4">
			<div class="row mb-4">
				<div class="col">
					<div class="feature-box feature-box-style-2">
						<div class="feature-box-icon mt-1">
							<i class="icon-location-pin icons"></i>
						</div>
						<div class="feature-box-info">
							<h2 class="font-weight-bold text-color-dark">- Dirección</h2>
							<p class="text-4">
								{{ $datasitio->nuestra_ubicacion }}
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-4">
				<div class="col">
					<div class="feature-box feature-box-style-2">
						<div class="feature-box-icon mt-1">
							<i class="icon-phone icons"></i>
						</div>
						<div class="feature-box-info">
							<h2 class="font-weight-bold text-color-dark">- Télefono</h2>
							<p class="text-4">
								{{ $datasitio->telefono }}
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-4">
				<div class="col">
					<div class="feature-box feature-box-style-2">
						<div class="feature-box-icon mt-1">
							<i class="icon-envelope icons"></i>
						</div>
						<div class="feature-box-info">
							<h2 class="font-weight-bold text-color-dark">- Email</h2>
							<p class="text-4">
								<a href="mailto:{{ $datasitio->email }}" class="text-decoration-none">{{ $datasitio->email }}</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('javascript')
<x-captcha-js />
@endsection
