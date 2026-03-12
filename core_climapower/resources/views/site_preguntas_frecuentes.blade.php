@extends('layouts.appsitioweb')

@section('content')
<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
				<h1>- Preguntas Frecuentes</h1>
			</div>
			<div class="col-md-4 order-1 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-end breadcrumb-light">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li class="active">Preguntas Frecuentes</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container py-4">
    <div class="row">
        <div class="col">
            <h2 class="font-weight-normal text-7 mb-2">Preguntas <strong class="font-weight-extra-bold">Frecuentes</strong></h2>
            <p class="lead">
                {!! $datasitio->datatxt !!}
            </p>
            <hr class="solid my-5">
            <div class="toggle toggle-primary m-0" data-plugin-toggle data-plugin-options='{"isAccordion": true}'>
                @if($listpreguntasfrecuentes)
                    @forelse ($listpreguntasfrecuentes as $indexpreg => $pregunta)
                        <section class="toggle @if($indexpreg == 0) active @endif">
                            <a class="toggle-title">{{ $pregunta->pregunta }}</a>
                            <div class="toggle-content">
                                <p>{{ $pregunta->respuesta }}</p>
                            </div>
                        </section>
                    @empty
                        <p>No existen registros de preguntas frecuentes.</p>
                    @endforelse
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
