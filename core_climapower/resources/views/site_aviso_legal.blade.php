@extends('layouts.appsitioweb')

@section('content')
<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
				<h1>- Aviso Legal</h1>
			</div>
			<div class="col-md-4 order-1 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-end breadcrumb-light">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li class="active">Aviso Legal</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container py-4">
    <div class="row">
        <div class="col">
            <h2 class="font-weight-normal text-7 mb-2">Aviso <strong class="font-weight-extra-bold">Legal</strong></h2>
            <p class="lead">
                {!! $datasitio->datatxt !!}
            </p>
            <hr class="solid my-5">
            <div class="toggle toggle-primary m-0" data-plugin-toggle>
                @if($listavisoslegales)
                    @forelse ($listavisoslegales as $indexaviso => $aviso)
                        <section class="toggle @if($indexaviso == 0) active @endif">
                            <a class="toggle-title">{{ $aviso->titulo }}</a>
                            <div class="toggle-content">
                                <p>{!! $aviso->descripcion !!}</p>
                            </div>
                        </section>
                    @empty
                        <p>No existen registros de avisos legales.</p>
                    @endforelse
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
