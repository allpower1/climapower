@extends('layouts.appsitioweb')

@section('content')
<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
				<h1>- Acerca Nosotros</h1>
				<span class="d-block text-4">Quienés Somos</span>
			</div>
			<div class="col-md-4 order-1 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-end breadcrumb-light">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li class="active">Acerca Nosotros</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div class="row pt-1 pb-4 mb-3">
		<div class="col">
			<p class="lead mb-4">{!! $dataacercanosotros->texto_primera_parte !!}</p>
			<div class="row content-grid-row pb-3 pt-4">
				@if($datasitio->anios_negocio)
				<div class="content-grid-item col-lg-3">
					<div class="counters mb-4">
						<div class="counter custom-sm-counter-style">
							<img class="counter-icon" src="img/demos/business-consulting/icons/icon-1.png" alt />
							<strong class="text-color-primary custom-primary-font pt-3 pb-0" data-to="{{$datasitio->anios_negocio}}" data-append="+">0</strong>
							<label>Años de Negocios</label>
						</div>
					</div>
				</div>
				@endif
				@if($datasitio->casos_exitos)
				<div class="content-grid-item col-lg-3">
					<div class="counters mb-4">
						<div class="counter custom-sm-counter-style">
							<img class="counter-icon" src="img/demos/business-consulting/icons/icon-2.png" alt />
							<strong class="text-color-primary custom-primary-font pt-3 pb-0" data-to="{{$datasitio->casos_exitos}}" data-append="+">0</strong>
							<label>Casos Exitosos</label>
						</div>
					</div>
				</div>
				@endif
				@if($datasitio->clientes_satisfechos)
				<div class="content-grid-item col-lg-3">
					<div class="counters mb-4">
						<div class="counter">
							<img class="counter-icon" src="img/demos/business-consulting/icons/icon-3.png" alt />
							<strong class="text-color-primary custom-primary-font pt-3 pb-0" data-to="{{$datasitio->clientes_satisfechos}}" data-append="+">0</strong>
							<label>Clientes Satisfechos</label>
						</div>
					</div>
				</div>
				@endif
				@if($datasitio->consultores_profesionales)
				<div class="content-grid-item col-lg-3 bg-color-light">
					<div class="counters mb-4">
						<div class="counter">
							<img class="counter-icon" src="img/demos/business-consulting/icons/icon-4.png" alt />
							<strong class="text-color-primary custom-primary-font pt-3 pb-0" data-to="{{$datasitio->consultores_profesionales}}" data-append="+">0</strong>
							<label>Consultores Profesionales</label>
						</div>
					</div>
				</div>
				@endif
			</div>
			<p>{!! $dataacercanosotros->texto_segunda_parte !!}</p>
			<div class="row pb-4 pt-4 mt-4">
				@if($dataacercanosotros->imagen_uno)
				<div class="col-lg-4">
					<img src="{{ url('fileacercanosotros/'.$dataacercanosotros->imagen_uno) }}" class="img-fluid mb-4" style="width: 371px; height:255px;" alt="">
				</div>
				@endif
				@if($dataacercanosotros->imagen_dos)
				<div class="col-lg-4">
					<img src="{{ url('fileacercanosotros/'.$dataacercanosotros->imagen_dos) }}" class="img-fluid mb-4" style="width: 371px; height:255px;" alt="">
				</div>
				@endif
				@if($dataacercanosotros->imagen_tres)
				<div class="col-lg-4">
					<img src="{{ url('fileacercanosotros/'.$dataacercanosotros->imagen_tres) }}" class="img-fluid mb-4" style="width: 371px; height:255px;" alt="">
				</div>
				@endif
			</div>
			<p>{!! $dataacercanosotros->texto_tercera_parte !!}</p>
		</div>
	</div>
</div>
@endsection