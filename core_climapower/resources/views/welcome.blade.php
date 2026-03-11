@extends('layouts.appsitioweb')

@section('content')
<!-- seccion slider home -->
@if(!$sliderhome->isEmpty())
<div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover show-dots-xs show-dots-sm show-dots-md dots-light custom-nav-arrows-1 nav-dark nav-md nav-font-size-md show-nav-hover mb-0" @if(count($sliderhome) > 1) data-plugin-options="{'autoplayTimeout': 9000, 'loop': true}" @else data-plugin-options="{'loop': false, 'autoplay': false, 'nav': false, 'dots': false}" @endif style="height: 100vh;">
	<div class="owl-stage-outer">
		<div class="owl-stage">

			<!-- Carousel Slide 1 -->
			@foreach($sliderhome as $slider)
			<div class="owl-item position-relative pt-5" style="background-image: url({{ url('filesliderhome/'.$slider->imagen) }}); background-size: cover; background-position: center;">
				<div class="container position-relative z-index-3 pb-5 h-100">
					<div class="row align-items-center pb-5 h-100">
						<div class="col">
							<h1 class="custom-secondary-font text-color-light font-weight-extra-bold text-8 line-height-1 line-height-sm-3 mb-5 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">{{ $slider->titulo_parte_1 }}<br><span class="custom-secondary-font text-4-5">{{ $slider->titulo_parte_2 }}</span></h1>
							@if($slider->texto_boton && $slider->url_boton)
							<a href="{{ $slider->url_boton }}" class="btn btn-primary btn-modern font-weight-bold text-2 py-3 btn-px-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">{{ $slider->texto_boton }}</a>
							@endif
						</div>
					</div>
				</div>
			</div>
			@endforeach

		</div>
	</div>
	 @if(count($sliderhome) > 1)
	<div class="owl-nav">
		<button type="button" role="presentation" class="owl-prev" aria-label="Previous"></button>
		<button type="button" role="presentation" class="owl-next" aria-label="Next"></button>
	</div>
	@endif
</div>
@endif

<!-- seccion precontacto -->
<section class="looking-for custom-md-border-top @if($sliderhome->isEmpty()) custom-position-2 @endif @if(!$sliderhome->isEmpty()) custom-position-1 z-index-1 @endif">
	<div class="container" style="@if($sliderhome->isEmpty()) margin-top: 75px; @endif">
		<div class="row align-items-center">
			<div class="col-md-6 col-lg-7">
				<div class="looking-for-box">
					<h2>- <span class="text-1 custom-secondary-font">{{ $datasitio->seccion_precontacto_titulo_parte1 }}</span><br>
					{{ $datasitio->seccion_precontacto_titulo_parte2 }}</h2>
					<p>{{ $datasitio->seccion_precontacto_subtitulo }}</p>
				</div>
			</div>
			<div class="col-md-3 d-flex justify-content-md-end mb-4 mb-md-0">
				<a class="text-decoration-none" href="tel:+{{$datasitio->telefono}}" target="_blank" title="Llámanos ahora">
					<span class="custom-call-to-action">
						<span class="action-title text-color-primary">Llámanos ahora</span>
						<span class="action-info text-color-light">{{$datasitio->telefono}}</span>
					</span>
				</a>
			</div>
			<div class="col-md-3 col-lg-2">
				<a class="text-decoration-none" href="mail:{{$datasitio->email}}" target="_blank" title="Email">
					<span class="custom-call-to-action">
						<span class="action-title text-color-primary">Email</span>
						<span class="action-info text-color-light">{{$datasitio->email}}</span>
					</span>
				</a>
			</div>
		</div>
	</div>
</section>

<!-- seccion acerca nosotros -->
<section class="about-us custom-section-padding" id="about-us">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-6">
				<h2 class="font-weight-bold text-color-dark">- Acerca Nosotoros</h2>
				<div class="ps-4">
					<div class="row">
						<div class="col-lg-12">
							<p class="ps-4">{!! $dataacercanosotros->texto_primera_parte !!}</p>
						</div>
					</div>
					<a class="btn btn-outline custom-border-width btn-primary mt-3 mb-2 custom-border-radius font-weight-semibold text-uppercase" href="{{ url('acerca_nosotros') }}">Leer Más</a>
				</div>
			</div>
			<div class="col-md-6 col-lg-6 position-relative">
				<div class="content-grid custom-content-grid mt-5 mb-4">
					<div class="row content-grid-row">
						@if($datasitio->anios_negocio)
						<div class="content-grid-item col-lg-6 bg-color-light p-4">
							<div class="counters">
								<div class="counter custom-sm-counter-style">
									<img class="counter-icon" src="{{ url('img/demos/business-consulting/icons/icon-1.png') }}" alt />
									<strong class="text-color-primary custom-primary-font" data-to="{{$datasitio->anios_negocio}}" data-append="+">0</strong>
									<label>Años de Negocios</label>
								</div>
							</div>
						</div>
						@endif
						@if($datasitio->casos_exitos)
						<div class="content-grid-item col-lg-6 p-4">
							<div class="counters">
								<div class="counter margin-style-2 custom-sm-counter-style">
									<img class="counter-icon" src="{{ url('img/demos/business-consulting/icons/icon-2.png') }}" alt />
									<strong class="text-color-primary custom-primary-font" data-to="{{$datasitio->casos_exitos}}" data-append="+">0</strong>
									<label>Casos Exitosos</label>
								</div>
							</div>
						</div>
						@endif
					</div>
					<div class="row content-grid-row">
						@if($datasitio->clientes_satisfechos)
						<div class="content-grid-item col-lg-6 p-4">
							<div class="counters">
								<div class="counter custom-sm-counter-style">
									<img class="counter-icon" src="{{ url('img/demos/business-consulting/icons/icon-3.png') }}" alt />
									<strong class="text-color-primary custom-primary-font" data-to="{{$datasitio->clientes_satisfechos}}" data-append="+">0</strong>
									<label>Clientes Satisfechos</label>
								</div>
							</div>
						</div>
						@endif
						@if($datasitio->consultores_profesionales)
						<div class="content-grid-item col-lg-6 bg-color-light p-4">
							<div class="counters">
								<div class="counter margin-style-2 custom-sm-counter-style">
									<img class="counter-icon" src="{{ url('img/demos/business-consulting/icons/icon-4.png') }}" alt />
									<strong class="text-color-primary custom-primary-font" data-to="{{$datasitio->consultores_profesionales}}" data-append="+">0</strong>
									<label>Consultores Profesionales</label>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- seccion experiencias -->
<section class="section-secondary custom-section-padding">
	<div class="container">
		<div class="row mb-4">
			<div class="col">
				<h2 class="font-weight-bold text-color-dark mb-3">- Experiencias</h2>
			</div>
		</div>
		<div class="row">
			@if($listexperiencias)
				@forelse ($listexperiencias as $indexeexp => $experiencia)
					<div class="col-lg-4">
						<a href="{{ url('experiencia') }}/{{ $experiencia->id }}" class="text-decoration-none appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="0">
							<div class="feature-box custom-feature-box feature-box-style-2">
								<div class="feature-box-icon">
									@if($experiencia->adjunto)
										<img src="{{ url('fileexperiencia/'.$experiencia->adjunto) }}" alt="">
									@else
										<img src="{{ url('img/demos/business-consulting/expertise/expertise-1.jpg') }}" alt="">
									@endif
								</div>
								<div class="feature-box-info ms-3">
									<h4 class="font-weight-normal text-5">{{ $experiencia->titulo }}</h4>
									<p class="text-2">{{ $experiencia->subtitulo }}</p>
								</div>
							</div>
						</a>
					</div>
				@empty
					<p>No existen registros de experiencias.</p>
				@endforelse
			@endif
		</div>
		@if(count($listexperiencias) > 0)
		<div class="row">
			<div class="col-lg-12 text-center">
				<a class="btn btn-outline custom-border-width btn-primary custom-border-radius font-weight-semibold text-uppercase mb-3" href="{{ url('experiencias') }}" title="View All">Ver Todos</a>
			</div>
		</div>
		@endif
	</div>
</section>

<!-- seccion nuestras estrategias y preguntas frecuentes -->
<section class="custom-section-padding">
	<div class="container">
		<div class="row mb-3">
			<div class="col-lg-6">
				<h2 class="font-weight-bold text-color-dark">- Nuestras estrategias</h2>
				<div class="owl-carousel owl-theme nav-bottom rounded-nav numbered-dots ps-1 pe-1" data-plugin-options="{'items': 1, 'loop': false, 'dots': true, 'nav': false}">
					@if($listnuestrasestrategias)
						@forelse ($listnuestrasestrategias as $indexestrat => $estrategia)
							<div>
								<div class="custom-step-item">
									<span class="step text-uppercase">
										Estrat.
										<span class="step-number text-color-primary">
											{{ $indexestrat + 1 }}
										</span>
									</span>
									<div class="step-content">
										<h4 class="mb-3">{{ $estrategia->titulo }}</h4>
										<p>{!! $estrategia->descripcion !!}</p>
									</div>
								</div>
							</div>
						@empty
							<p>No existen registros de estrategias.</p>
						@endforelse
					@endif
				</div>
			</div>
			<div class="col-lg-6">
				<h2 class="font-weight-bold text-color-dark">- Preguntas Frecuentes</h2>
				<div class="accordion without-bg custom-accordion-style-1" id="accordion7">
					@if($listpreguntasfrecuentes)
						@forelse ($listpreguntasfrecuentes as $indexpreg => $pregresp)
							<div class="card card-default">
								<div class="card-header">
									<h4 class="card-title m-0">
										<a class="accordion-toggle collapsed" data-bs-toggle="collapse" data-bs-parent="#accordion7" href="#collapse7{{ $indexpreg }}" aria-expanded="false">
											{{ $pregresp->pregunta }}
											<span class="custom-accordion-plus"></span>
										</a>
									</h4>
								</div>
								<div id="collapse7{{ $indexpreg }}" class="collapse" aria-expanded="false" style="height: 0px;">
									<div class="card-body">
										<p>{{ $pregresp->respuesta }}.</p>
									</div>
								</div>
							</div>
						@empty
							<p>No existen registros de preguntas frecuentes.</p>
						@endforelse
					@endif
				</div>
			</div>
		</div>
	</div>
</section>

<!--seccion nuestros proyectos -->
<section class="section-secondary custom-section-padding-2">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="font-weight-bold text-color-dark mb-3">- Nuestros Proyectos</h2>
			</div>
		</div>
	</div>
	@if($listproyectos->isNotEmpty())
		<div class="owl-carousel show-nav-title custom-both-sides-shadow custom-dots-position-2 custom-dots-style-1 custom-xs-arrows-style-2 mb-0" data-plugin-options="{'items': 6, 'loop': false, 'dots': true, 'nav': false}">
			@foreach ($listproyectos as $indexproyecto => $proyecto)
				<div>
					<a href="{{ url('/proyecto/'.$proyecto->id) }}" class="text-decoration-none">
						<span class="thumb-info custom-thumb-info-style-1 thumb-info-hide-wrapper-bg">
							<span class="thumb-info-wrapper m-0">
								@if($proyecto->imagen)
									<img src="{{ url('fileproyecto/'.$proyecto->imagen) }}" alt="" class="img-fluid">
								@else
									<img src="{{ url('img/demos/business-consulting/cases/case-1.jpg') }}" alt="" class="img-fluid" />
								@endif
							</span>
							<span class="thumb-info-caption bg-color-secondary p-4 pt-5 pb-5">
								<span class="custom-thumb-info-title">
									<span class="custom-thumb-info-name font-weight-semibold text-color-dark text-4">{{ $proyecto->titulo }}</span>
									<span class="custom-thumb-info-desc font-weight-light">{{ $proyecto->subtitulo }}</span>
								</span>
								<span class="custom-arrow"></span>
							</span>
						</span>
					</a>
				</div>
			@endforeach
		</div>
	@else
		<div class="container">
			<div class="row">
				<div class="col">
					<p>No existen registros de proyectos.</p>
				</div>
			</div>
		</div>
	@endif
</section>

<!-- seccion testimonios -->
<section class="custom-section-padding">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="font-weight-bold text-color-dark">- Testimonios</h2>

				@if (session('successenviotestimonio'))
					<div class="contact-form-success alert alert-success mt-4">
						<strong>Exito!</strong> {{ session('successenviotestimonio') }}.
					</div>
				@endif

				@if (Session::has('errortestimonio'))
					<div class="contact-form-error alert alert-danger mt-4">
						{{ Session::get('errortestimonio') }}
					</div>
				@endif

			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="owl-carousel show-nav-title custom-dots-style-1 custom-dots-position custom-xs-arrows-style-2 mb-0" data-plugin-options="{'items': 1, 'autoHeight': true, 'loop': false, 'nav': false, 'dots': true}">
					@if($listtestimonios)
						@forelse ($listtestimonios as $indextestimonio => $testimonio)
							<div class="row">
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
							</div>
						@empty
							<p>No existen registros de testimonios.</p>
						@endforelse
					@endif
				</div>
			</div>
		</div>
		<div class="row text-center mt-5">
			<div class="col">
				<button type="button" class="btn btn-outline custom-border-width btn-primary custom-border-radius font-weight-semibold text-uppercase" data-bs-toggle="modal" data-bs-target="#modalIngresarTestimonio">Ingresar tu testimonio</button>
			</div>
		</div>
	</div>
</section>

<!-- seccion nuestro equipo -->
<section class="section-secondary custom-section-padding">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="font-weight-bold text-color-dark">- Nuestro Equipo</h2>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="owl-carousel show-nav-title custom-dots-style-1 custom-dots-position custom-xs-arrows-style-2 mb-0" data-plugin-options="{'items': 4, 'margin': 20, 'autoHeight': true, 'loop': false, 'nav': false, 'dots': true}">
					@if($listnuestroequipo)
						@forelse ($listnuestroequipo as $indexequipo => $equipo)
							<div>
								<div class="team-item p-0">
									<a href="{{ url('/equipo/'.$equipo->id) }}" class="text-decoration-none">
										<span class="image-wrapper">
											@if($equipo->adjunto)
												<img src="{{ url('fileequipo/'.$equipo->adjunto) }}" alt="" class="img-fluid" style="width:600px;height:265px;">
											@else
												<img src="{{ url('img/demos/business-consulting/team/team-1.jpg') }}" alt="" class="img-fluid" />
											@endif
										</span>
									</a>
									<div class="team-infos">
										<a href="{{ url('/equipo/'.$equipo->id) }}" class="text-decoration-none">
											<span class="team-member-name text-color-dark font-weight-semibold text-4">{{ $equipo->nombre_completo }}</span>
											<span class="team-member-desc font-weight-light">{{ $equipo->cargo }}</span>
										</a>
									</div>
								</div>
							</div>
						@empty
							<p>No existen registros de equipo.</p>
						@endforelse
					@endif
				</div>
			</div>
		</div>
		<div class="row text-center mt-5">
			<div class="col">
				<a class="btn btn-outline custom-border-width btn-primary custom-border-radius font-weight-semibold text-uppercase" href="{{ url('nuestro_equipo') }}">Ver Todos</a>
			</div>
		</div>
	</div>
</section>

<!-- seccion precontacto -->
<section class="looking-for section-primary">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 col-lg-7">
				<div class="looking-for-box">
					<h2>- <span class="text-1 custom-secondary-font">{{ $datasitio->seccion_precontacto_titulo_parte1 }}</span><br>
					{{ $datasitio->seccion_precontacto_titulo_parte2 }}</h2>
					<p class="mb-4 mb-md-0">{{ $datasitio->seccion_precontacto_subtitulo }}</p>
				</div>
			</div>
			<div class="col-md-3 d-flex justify-content-md-end mb-4 mb-md-0">
				<a class="text-decoration-none" href="tel:+{{$datasitio->telefono}}" target="_blank" title="Llámanos ahora">
					<span class="custom-call-to-action white-border text-color-light">
						<span class="action-title">Llámanos ahora</span>
						<span class="action-info">{{ $datasitio->telefono }}</span>
					</span>
				</a>
			</div>
			<div class="col-md-3 col-lg-2">
				<a class="text-decoration-none" href="mail:{{ $datasitio->email }}" target="_blank" title="Email">
					<span class="custom-call-to-action white-border text-color-light">
						<span class="action-title">Email</span>
						<span class="action-info">{{ $datasitio->email }}</span>
					</span>
				</a>
			</div>
		</div>
	</div>
</section>

<!-- modal ingresar testimonio -->
<div class="modal fade" id="modalIngresarTestimonio" tabindex="-1" aria-labelledby="modalIngresarTestimonioLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalIngresarTestimonioLabel">Ingresa tu testimonio</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
			</div>
			<form class="custom-contact-form-style-1" action="{{ url('enviar_testimonio') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">
					<div class="row">
						<div class="form-group col">
							<div class="custom-input-box">
								<i class="icon-user icons text-color-primary"></i>
								<input type="text" placeholder="Nombre*" value="{{ old('nombre') }}" data-msg-required="Por favor ingresa tu nombre." maxlength="191" class="form-control" name="nombre" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col">
							<div class="custom-input-box">
								<i class="icon-envelope icons text-color-primary"></i>
								<input type="email" placeholder="Correo electrónico* (no será publicado en el sitio web)" value="{{ old('email') }}" data-msg-required="Por favor ingresa tu correo electrónico." data-msg-email="Por favor ingresa un email válido." maxlength="100" class="form-control" name="email" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col">
							<div class="custom-input-box">
								<i class="icon-user icons text-color-primary"></i>
								<input type="text" placeholder="Cargo" value="{{ old('cargo') }}" data-msg-required="Por favor ingresa tu cargo." maxlength="100" class="form-control" name="cargo">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col">
							<div class="custom-input-box">
								<i class="icon-user icons text-color-primary"></i>
								<input type="file" placeholder="Imagen" value="{{ old('imagen') }}" style="margin-top: 10px;" accept="image/png,image/jpg,image/jpeg" data-msg-required="Por favor ingresa tu imagen." class="form-control" name="imagen">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col">
							<div class="custom-input-box">
								<i class="icon-bubble icons text-color-primary"></i>
								<textarea maxlength="5000" data-msg-required="Por favor ingresa tu testimonio." rows="10" class="form-control" name="testimonio" placeholder="Testimonio*" required>{{ old('testimonio') }}</textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-12" style="text-align: center;">
							<x-captcha-container />
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Enviar Testimonio</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection
@section('javascript')
<x-captcha-js />
@endsection
