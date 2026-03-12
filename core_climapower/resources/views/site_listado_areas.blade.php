@extends('layouts.appsitioweb')

@section('content')
<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
				<h1>- Áreas</h1>
			</div>
			<div class="col-md-4 order-1 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-end breadcrumb-light">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li class="active">Áreas</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div class="row pt-1 pb-5 mb-3">
		<div class="col">
			@if($listareas)
				@forelse ($listareas as $indexeexp => $area)
					<div class="row mb-3">
						<div class="col">
							<div class="feature-box custom-feature-box custom-feature-box-active feature-box-style-2">
								<div class="feature-box-icon">
									@if($area->adjunto)
										<img src="{{ url('filearea/'.$area->adjunto) }}" alt="">
									@else
										<img src="{{ url('img/demos/business-consulting/expertise/expertise-1.jpg') }}" alt="">
									@endif
								</div>
								<div class="feature-box-info ms-3">
									<h4 class="font-weight-normal text-5">{{ $area->titulo }}</h4>
									<p>{{ $area->subtitulo }}.</p>
									<a href="{{ url('area') }}/{{ $area->id }}">Leer más <i class="fas fa-long-arrow-alt-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				@empty
					<p>No existen registros de áreas.</p>
				@endforelse
			@endif
		</div>
	</div>
</div>
@endsection
