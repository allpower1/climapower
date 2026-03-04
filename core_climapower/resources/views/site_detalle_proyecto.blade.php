@extends('layouts.appsitioweb')

@section('content')
<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
				<h1>- {{ $proyecto->titulo }}</h1>
				<span class="d-block text-4">{{ $proyecto->titulo }}</span>
			</div>
			<div class="col-md-4 order-1 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-end breadcrumb-light">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li><a href="{{ url('/proyectos') }}">Proyectos</a></li>
					<li class="active">{{ $proyecto->titulo }}</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div class="row pt-1 pb-5 mb-3">
		<div class="col">
			<div class="portfolio-info">
				<div class="row">
					<div class="col">
						<ul>
							<li>
								<i class="fas fa-calendar-alt"></i> {{ $proyecto->fecha_creacion_formateado }}
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-8 col-sm-6 col-lg-8">
					<p class="lead mb-4">{!! $proyecto->datahtml !!}.</p>
				</div>
				<div class="col-4 col-sm-6 col-lg-4">
					@if($proyecto->imagen)
						<img src="{{ url('fileproyecto/'.$proyecto->imagen) }}" alt="" style="max-width: 260px;" class="img-fluid float-end ms-5 mb-4">
					@else
						<img src="{{ url('img/demos/business-consulting/cases/case-4.jpg') }}" alt="" style="max-width: 260px;" class="img-fluid float-end ms-5 mb-4">
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
