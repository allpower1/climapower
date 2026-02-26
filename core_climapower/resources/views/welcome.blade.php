@extends('layouts.appsitioweb')

@section('content')
<div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover show-dots-xs show-dots-sm show-dots-md dots-light custom-nav-arrows-1 nav-dark nav-md nav-font-size-md show-nav-hover mb-0" data-plugin-options="{'autoplayTimeout': 9000}" style="height: 100vh;">
	<div class="owl-stage-outer">
		<div class="owl-stage">

			<!-- Carousel Slide 1 -->
			<div class="owl-item position-relative pt-5" style="background-image: url(img/demos/business-consulting/slides/slide-1.jpg); background-size: cover; background-position: center;">
				<div class="container position-relative z-index-3 pb-5 h-100">
					<div class="row align-items-center pb-5 h-100">
						<div class="col">
							<h1 class="custom-secondary-font text-color-light font-weight-extra-bold text-8 line-height-1 line-height-sm-3 mb-5 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">Get your<br><span class="custom-secondary-font text-4-5">Free Consultation</span></h1>
							<a href="#" class="btn btn-primary btn-modern font-weight-bold text-2 py-3 btn-px-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">GET STARTED</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Carousel Slide 2 -->
			<div class="owl-item position-relative pt-5" style="background-image: url(img/demos/business-consulting/slides/slide-2.jpg); background-size: cover; background-position: center;">
				<div class="container position-relative z-index-3 pb-5 h-100">
					<div class="row align-items-center pb-5 h-100">
						<div class="col">
							<h1 class="custom-secondary-font text-color-light font-weight-extra-bold text-8 line-height-1 line-height-sm-3 mb-5 appear-animation" data-appear-animation="fadeInLeftShorterPlus" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">Solutions for<br><span class="custom-secondary-font text-4-5">Pro Business Plan</span></h1>
							<a href="#" class="btn btn-primary btn-modern font-weight-bold text-2 py-3 btn-px-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">GET STARTED</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<div class="owl-nav">
		<button type="button" role="presentation" class="owl-prev" aria-label="Previous"></button>
		<button type="button" role="presentation" class="owl-next" aria-label="Next"></button>
	</div>
</div>

<section class="looking-for custom-position-1 custom-md-border-top z-index-1">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 col-lg-7">
				<div class="looking-for-box">
					<h2>- <span class="text-1 custom-secondary-font">Are you looking for a</span><br>
					Business Plan Consultant?</h2>
					<p>Schedule your company strategy right session now</p>
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
									<label>Consultares Profesionales</label>
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
		@if(count($listexperiencias) > 6)
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
										<p>{{ $estrategia->descripcion }}</p>
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

<section class="section-secondary custom-section-padding-2">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="font-weight-bold text-color-dark mb-3">- Our Cases</h2>
			</div>
		</div>
	</div>
	<div class="owl-carousel show-nav-title custom-both-sides-shadow custom-dots-position-2 custom-dots-style-1 custom-xs-arrows-style-2 mb-0" data-plugin-options="{'items': 6, 'loop': false, 'dots': true, 'nav': false}">
		<div>
			<a href="#" class="text-decoration-none">
				<span class="thumb-info custom-thumb-info-style-1 thumb-info-hide-wrapper-bg">
					<span class="thumb-info-wrapper m-0">
						<img src="{{ url('img/demos/business-consulting/cases/case-1.jpg') }}" class="img-fluid" alt="">
					</span>
					<span class="thumb-info-caption bg-color-secondary p-4 pt-5 pb-5">
						<span class="custom-thumb-info-title">
							<span class="custom-thumb-info-name font-weight-semibold text-color-dark text-4">Corporate Finance</span>
							<span class="custom-thumb-info-desc font-weight-light">Okler</span>
						</span>
						<span class="custom-arrow"></span>
					</span>
				</span>
			</a>
		</div>
		<div>
			<a href="#" class="text-decoration-none">
				<span class="thumb-info custom-thumb-info-style-1 thumb-info-hide-wrapper-bg">
					<span class="thumb-info-wrapper m-0">
						<img src="{{ url('img/demos/business-consulting/cases/case-2.jpg') }}" class="img-fluid" alt="">
					</span>
					<span class="thumb-info-caption bg-color-secondary p-4 pt-5 pb-5">
						<span class="custom-thumb-info-title">
							<span class="custom-thumb-info-name font-weight-semibold text-color-dark text-4">Corporate Restructuring</span>
							<span class="custom-thumb-info-desc font-weight-light">Envato</span>
						</span>
						<span class="custom-arrow"></span>
					</span>
				</span>
			</a>
		</div>
		<div>
			<a href="#" class="text-decoration-none">
				<span class="thumb-info custom-thumb-info-style-1 thumb-info-hide-wrapper-bg">
					<span class="thumb-info-wrapper m-0">
						<img src="{{ url('img/demos/business-consulting/cases/case-3.jpg') }}" class="img-fluid" alt="">
					</span>
					<span class="thumb-info-caption bg-color-secondary p-4 pt-5 pb-5">
						<span class="custom-thumb-info-title">
							<span class="custom-thumb-info-name font-weight-semibold text-color-dark text-4">Economic Consultanting</span>
							<span class="custom-thumb-info-desc font-weight-light">Porto</span>
						</span>
						<span class="custom-arrow"></span>
					</span>
				</span>
			</a>
		</div>
		<div>
			<a href="#" class="text-decoration-none">
				<span class="thumb-info custom-thumb-info-style-1 thumb-info-hide-wrapper-bg">
					<span class="thumb-info-wrapper m-0">
						<img src="{{ url('img/demos/business-consulting/cases/case-4.jpg') }}" class="img-fluid" alt="">
					</span>
					<span class="thumb-info-caption bg-color-secondary p-4 pt-5 pb-5">
						<span class="custom-thumb-info-title">
							<span class="custom-thumb-info-name font-weight-semibold text-color-dark text-4">Tech Consulting</span>
							<span class="custom-thumb-info-desc font-weight-light">GetCustom</span>
						</span>
						<span class="custom-arrow"></span>
					</span>
				</span>
			</a>
		</div>
		<div>
			<a href="#" class="text-decoration-none">
				<span class="thumb-info custom-thumb-info-style-1 thumb-info-hide-wrapper-bg">
					<span class="thumb-info-wrapper m-0">
						<img src="{{ url('img/demos/business-consulting/cases/case-5.jpg') }}" class="img-fluid" alt="">
					</span>
					<span class="thumb-info-caption bg-color-secondary p-4 pt-5 pb-5">
						<span class="custom-thumb-info-title">
							<span class="custom-thumb-info-name font-weight-semibold text-color-dark text-4">Strategic</span>
							<span class="custom-thumb-info-desc font-weight-light">Jet Orange</span>
						</span>
						<span class="custom-arrow"></span>
					</span>
				</span>
			</a>
		</div>
		<div>
			<a href="#" class="text-decoration-none">
				<span class="thumb-info custom-thumb-info-style-1 thumb-info-hide-wrapper-bg">
					<span class="thumb-info-wrapper m-0">
						<img src="{{ url('img/demos/business-consulting/cases/case-1.jpg') }}" class="img-fluid" alt="">
					</span>
					<span class="thumb-info-caption bg-color-secondary p-4 pt-5 pb-5">
						<span class="custom-thumb-info-title">
							<span class="custom-thumb-info-name font-weight-semibold text-color-dark text-4">Litigation</span>
							<span class="custom-thumb-info-desc font-weight-light">Paradoxx</span>
						</span>
						<span class="custom-arrow"></span>
					</span>
				</span>
			</a>
		</div>
		<div>
			<a href="#" class="text-decoration-none">
				<span class="thumb-info custom-thumb-info-style-1 thumb-info-hide-wrapper-bg">
					<span class="thumb-info-wrapper m-0">
						<img src="{{ url('img/demos/business-consulting/cases/case-2.jpg') }}" class="img-fluid" alt="">
					</span>
					<span class="thumb-info-caption bg-color-secondary p-4 pt-5 pb-5">
						<span class="custom-thumb-info-title">
							<span class="custom-thumb-info-name font-weight-semibold text-color-dark text-4">Consulting</span>
							<span class="custom-thumb-info-desc font-weight-light">iMessenger</span>
						</span>
						<span class="custom-arrow"></span>
					</span>
				</span>
			</a>
		</div>
		<div>
			<a href="#" class="text-decoration-none">
				<span class="thumb-info custom-thumb-info-style-1 thumb-info-hide-wrapper-bg">
					<span class="thumb-info-wrapper m-0">
						<img src="{{ url('img/demos/business-consulting/cases/case-3.jpg') }}" class="img-fluid" alt="">
					</span>
					<span class="thumb-info-caption bg-color-secondary p-4 pt-5 pb-5">
						<span class="custom-thumb-info-title">
							<span class="custom-thumb-info-name font-weight-semibold text-color-dark text-4">Brand Consulting</span>
							<span class="custom-thumb-info-desc font-weight-light">Theme Forest</span>
						</span>
						<span class="custom-arrow"></span>
					</span>
				</span>
			</a>
		</div>
		<div>
			<a href="#" class="text-decoration-none">
				<span class="thumb-info custom-thumb-info-style-1 thumb-info-hide-wrapper-bg">
					<span class="thumb-info-wrapper m-0">
						<img src="{{ url('img/demos/business-consulting/cases/case-4.jpg') }}" class="img-fluid" alt="">
					</span>
					<span class="thumb-info-caption bg-color-secondary p-4 pt-5 pb-5">
						<span class="custom-thumb-info-title">
							<span class="custom-thumb-info-name font-weight-semibold text-color-dark text-4">Corporate Consulting</span>
							<span class="custom-thumb-info-desc font-weight-light">Tucson</span>
						</span>
						<span class="custom-arrow"></span>
					</span>
				</span>
			</a>
		</div>
	</div>
</section>

<section class="custom-section-padding">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2 class="font-weight-bold text-color-dark">- Testimonials</h2>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="owl-carousel show-nav-title custom-dots-style-1 custom-dots-position custom-xs-arrows-style-2 mb-0" data-plugin-options="{'items': 1, 'autoHeight': true, 'loop': false, 'nav': false, 'dots': true}">
					<div class="row">
						<div class="col-8 col-sm-4 col-lg-2 text-center pt-5">
							<img src="{{ url('img/demos/business-consulting/testimonials/testimonial-author-2.jpg') }}" alt class="img-fluid custom-rounded-image" />
						</div>
						<div class="col-12 col-sm-12 col-lg-10">
							<div class="testimonial custom-testimonial-style-1 testimonial-with-quotes mb-0">
								<blockquote class="pb-2">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget risus porta, tincidunt turpis at, interdum tortor. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ante tellus, convallis non consectetur sed, pharetra nec ex. Aliquam et tortor nisi. Duis mollis diam nec elit volutpat suscipit.</p>
								</blockquote>
								<div class="testimonial-author float-start">
									<p><strong>John Smith</strong><span class="text-color-primary">CEO &amp; Founder - Okler</span></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8 col-sm-4 col-lg-2 text-center pt-5">
							<img src="{{ url('img/demos/business-consulting/testimonials/testimonial-author-3.jpg') }}" alt class="img-fluid custom-rounded-image" />
						</div>
						<div class="col-12 col-sm-12 col-lg-10">
							<div class="testimonial custom-testimonial-style-1 testimonial-with-quotes mb-0">
								<blockquote class="pb-2">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget risus porta, tincidunt turpis at, interdum tortor. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ante tellus, convallis non consectetur sed, pharetra nec ex. Aliquam et tortor nisi. Duis mollis diam nec elit volutpat suscipit.</p>
								</blockquote>
								<div class="testimonial-author float-start">
									<p><strong>John Smith</strong><span class="text-color-primary">CEO &amp; Founder - Okler</span></p>
								</div>
							</div>
						</div>
					</div>
				</div>
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

<section class="looking-for section-primary">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 col-lg-7">
				<div class="looking-for-box">
					<h2>- <span class="text-1 custom-secondary-font">Are you looking for a</span><br>
					Business plan Consultant?</h2>
					<p class="mb-4 mb-md-0">Schedule your company strategy right session now</p>
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

<!-- seccion footer -->
<section class="section section-text-light section-background m-0" style="background: url('{{ $fondofooter }}'); background-size: cover;">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-lg-6 mb-5 mb-lg-0">
				<h2 class="font-weight-bold">- Contáctanos</h2>
				<div class="row">
					<div class="col-md-6 custom-sm-margin-top">
						<h4 class="mb-1">Llámanos</h4>
						<a href="tel:+{{$datasitio->telefono}}" class="text-decoration-none" target="_blank" title="Llámanos">
							<span class="custom-call-to-action-2 text-color-light text-2 custom-opacity-font">
								Télefono
								<span class="info text-5">
									{{$datasitio->telefono}}
								</span>
							</span>
						</a>
					</div>
					<div class="col-md-6 custom-sm-margin-top">
						<h4 class="mb-1">Nuestra Ubicación</h4>
						<p class="custom-opacity-font">{{$datasitio->nuestra_ubicacion}}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 custom-sm-margin-top">
						<h4 class="mb-1">Email</h4>
						<a href="mail:{{$datasitio->email}}" class="text-decoration-none" target="_blank" title="Email">
							<span class="custom-call-to-action-2 text-color-light text-2 custom-opacity-font">
								Email
								<span class="info text-5">
									{{$datasitio->email}}
								</span>
							</span>
						</a>
					</div>
					<div class="col-md-6 custom-sm-margin-top">
						<h4 class="mb-1">Social Media</h4>
						<ul class="social-icons social-icons-clean custom-social-icons-style-1 mt-2 custom-opacity-font">
							@if($datasitio->rrss_facebook)
							<li class="social-icons-facebook">
								<a href="{{ $datasitio->rrss_facebook }}" target="_blank" title="Facebook">
									<i class="fab fa-facebook-f"></i>
								</a>
							</li>
							@endif
							@if($datasitio->rrss_twitter)
							<li class="social-icons-x">
								<a href="{{ $datasitio->rrss_twitter }}" target="_blank" title="X">
									<i class="fab fa-x-twitter"></i>
								</a>
							</li>
							@endif
							@if($datasitio->rrss_instagram)
							<li class="social-icons-instagram">
								<a href="{{ $datasitio->rrss_instagram }}" target="_blank" title="Instagram">
									<i class="fab fa-instagram"></i>
								</a>
							</li>
							@endif
							@if($datasitio->rrss_linkedin)
							<li class="social-icons-linkedin">
								<a href="{{ $datasitio->rrss_linkedin }}" target="_blank" title="Linkedin">
									<i class="fab fa-linkedin-in"></i>
								</a>
							</li>
							@endif
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-6 custom-sm-margin-top">
				<h2 class="font-weight-bold">- Escribenos</h2>
				<form class="custom-contact-form-style-1" action="{{ url('enviar_contacto') }}" method="POST">
					@csrf

					@include('partials.alerts')

					<input type="hidden" name="subject" value="Contact Message Received" />
					<div class="row">
						<div class="form-group col">
							<div class="custom-input-box">
								<i class="icon-user icons text-color-primary"></i>
								<input type="text" value="{{ old('nombre_completo') }}" data-msg-required="Por favor ingresa tu nombre." maxlength="100" class="form-control" name="nombre_completo" placeholder="Nombre*" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col">
							<div class="custom-input-box">
								<i class="icon-envelope icons text-color-primary"></i>
								<input type="email" value="{{ old('email') }}" data-msg-required="Por favor ingresa tu email." data-msg-email="Por favor ingresa un email válido." maxlength="100" class="form-control" name="email" placeholder="Email*" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col">
							<div class="custom-input-box">
								<i class="icon-bubble icons text-color-primary"></i>
								<textarea maxlength="5000" data-msg-required="Por favor ingresa tu mensaje." rows="10" class="form-control" name="mensaje" placeholder="Mensaje*" required>{{ old('mensaje') }}</textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col">
							<input type="submit" value="Enviar Ahora" class="btn btn-outline custom-border-width btn-primary custom-border-radius font-weight-semibold text-uppercase" data-loading-text="Loading...">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection
