@extends('layouts.appsitioweb')

@section('content')
<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
				<h1>- Detalle Equipo</h1>
			</div>
			<div class="col-md-4 order-1 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-end breadcrumb-light">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li><a href="{{ url('nuestro_equipo') }}">Nuestro Equipo</a></li>
					<li class="active">Detalle</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div class="row pt-1 pb-4 mb-3">
		<div class="col">
			<div class="row mb-4">
				<div class="col-md-3 text-center">
					<div class="team-item">
						<span class="image-wrapper">
							@if($equipo->adjunto)
								<img src="{{ url('fileequipo/'.$equipo->adjunto) }}" alt="" class="img-fluid" style="width:600px;height:300px;">
							@else
								<img src="{{ url('img/demos/business-consulting/team/team-1.jpg') }}" alt="" class="img-fluid" />
							@endif
						</span>
					</div>
				</div>
				<div class="col-md-9">
					<h1 class="mt-0 mb-0">- {{ $equipo->nombre_completo }}</h1>
					<p class="lead ms-4 pt-1">{{ $equipo->cargo }}</p>
					<p class="lead">{{ $equipo->descripcion_breve }}.</p>
					<ul class="list list-icons">
						@if($equipo->telefono)
							<li><i class="icon-phone icons"></i> <strong>Telefono:</strong> {{ $equipo->telefono }}</li>
						@endif
						@if($equipo->email)
							<li><i class="icon-envelope icons"></i> <strong>Email:</strong> <a href="mailto:{{ $equipo->email }}">{{ $equipo->email }}</a></li>
						@endif
					</ul>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col">
					<p>{!! $equipo->descripcion !!}</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
