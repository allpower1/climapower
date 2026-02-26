@extends('layouts.appsitioweb')

@section('content')
<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
				<h1>- Testimonios</h1>
				<span class="d-block text-4">Lo que dicen nuestros clientes sobre nosotros</span>
			</div>
			<div class="col-md-4 order-1 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-end breadcrumb-light">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li class="active">Testimonios</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div class="row pt-1">
		<div class="col">
			@if($listtestimonios)
				@forelse ($listtestimonios as $indextestimonio => $testimonio)
					<div class="row mb-4 pb-4">
						<div class="col-8 col-sm-4 col-lg-2 text-center pt-5">
							@if($testimonio->imagen)
								<img src="{{ url('filetestimonio/'.$testimonio->imagen) }}" alt class="img-fluid custom-rounded-image"/>
							@else
								<img src="{{ url('img/demos/business-consulting/testimonials/testimonial-author-2.jpg') }}" alt class="img-fluid custom-rounded-image" />
							@endif
						</div>
						<div class="col-12 col-sm-12 col-lg-10">
							<div class="testimonial custom-testimonial-style-1 testimonial-with-quotes mb-0">
								<blockquote class="pb-2">
									<p>{{ $testimonio->testimonio }}.</p>
								</blockquote>
								<div class="testimonial-author float-start">
									<p><strong>{{ $testimonio->nombre }}</strong><span class="text-color-primary">{{ $testimonio->cargo }}</span></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-12 col-lg-10">
							<br>
						</div>
						<hr>
					</div>
				@empty
					<p>No existen registros de testimonios.</p>
				@endforelse
			@endif
		</div>
	</div>
</div>
@endsection