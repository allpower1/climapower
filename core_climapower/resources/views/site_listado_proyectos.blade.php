@extends('layouts.appsitioweb')

@section('content')
<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
				<h1>- Nuestros Proyectos</h1>
				<span class="d-block text-4">Proyectos Exitosos</span>
			</div>
			<div class="col-md-4 order-1 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-end breadcrumb-light">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li class="active">Proyectos</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div class="row pt-1 pb-4 mb-3">
		<div class="col">
			<div class="row portfolio-list sort-destination" data-sort-id="portfolio">
				@if($listproyectos)
					@forelse ($listproyectos as $indexproyecto => $proyecto)
						<div class="col-lg-4 isotope-item">
							<a href="{{ url('proyecto') }}/{{ $proyecto->id }}" class="text-decoration-none">
								<span class="thumb-info custom-thumb-info-style-1 mb-4 pb-1 thumb-info-hide-wrapper-bg">
									<span class="thumb-info-wrapper m-0">
										@if($proyecto->imagen)
											<img src="{{ url('fileproyecto/'.$proyecto->imagen) }}" class="img-fluid" alt="">
										@else
											<img src="{{ url('img/demos/business-consulting/cases/case-1.jpg') }}" class="img-fluid" alt="">
										@endif
									</span>
									<span class="thumb-info-caption bg-color-secondary p-3 pt-4 pb-4">
										<span class="custom-thumb-info-title">
											<span class="custom-thumb-info-name font-weight-semibold text-color-dark text-4">{{ $proyecto->titulo }}</span>
											<span class="custom-thumb-info-desc font-weight-light">{{ $proyecto->subtitulo }}</span>
										</span>
										<span class="custom-arrow"></span>
									</span>
								</span>
							</a>
						</div>
					@empty
						<p>No existen registros de proyectos.</p>
					@endforelse
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
