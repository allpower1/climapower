@extends('layouts.appsitiosautoadminsitioweb')

@section('cssadicionales')
<style>
    .fade-switch {
        display: none;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .fade-switch.show {
        display: block;
        opacity: 1;
    }
</style>
@endsection

@section('content')
<div class="site-breadcrumb" style="padding-top:20px;padding-bottom:20px;">
	<div class="container" style="text-align: left;">
		<ul class="breadcrumb-menu classul">
			<li><a href="{{ url('/') }}">Home</a></li>
			<li class="active">Planes</li>
		</ul>
	</div>
</div>
<br>

@if (session('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="pricing-area py-10">
    <div class="container">
        @foreach($planesPorCategoria as $categoriaNombre => $planesAgrupados)
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="site-heading text-center">
                    <p>PRECIOS</p>
                    <h2 class="site-title">Nuestros Planes <span>{{ ucfirst($categoriaNombre) }}</span></h2>
                    <div class="heading-divider"></div>
                </div>
            </div>
        </div>
        <div class="row mt-20">
            @foreach($planesAgrupados as $nombre => $grupo)
            @php
                $mensual = $grupo->firstWhere('id_tipo_duracion', 2);
                $anual = $grupo->firstWhere('id_tipo_duracion', 1);
                $planGroupId = $mensual['id'] ?? $anual['id'] ?? 'sin_id';
            @endphp
            <div class="col-md-6 col-lg-3">
                <div class="pricing-item">
                    <div class="pricing-header">
                        <div class="pricing-header-content">
                            <h4>{{ $nombre }}</h4>
                            <!--<p class="text-muted mb-2">Categoría: {!! $categoriaNombre !!}</p>-->
                            {{-- SWITCH o INDICADOR DE TIPO --}}
                            @if(!empty($mensual) && !empty($anual))
                                @php
                                    $switchId = 'plan-switch-' . $planGroupId;
                                @endphp
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input plan-switch-toggle"
                                        type="checkbox"
                                        role="switch"
                                        id="{{ $switchId }}"
                                        name="plan_tipo_{{ $planGroupId }}"
                                        value="anual"
                                        onchange="cambiarPrecio('{{ $tipo }}',this)"
                                        data-switch-text-id="switch-text-{{ $planGroupId }}">
                                    <label class="form-check-label" for="{{ $switchId }}">
                                        <span id="switch-text-{{ $planGroupId }}">Mensual</span>
                                    </label>
                                </div>
                            @else
                                <p class="text-muted">
                                    Membresia: {{ !empty($mensual) ? 'Mensual' : (!empty($anual) ? 'Anual' : 'No definido') }}
                                </p>
                            @endif
                            {{-- PRECIOS --}}
                            <div class="precios" data-mensual-id="{{ $mensual['id'] ?? '' }}" data-anual-id="{{ $anual['id'] ?? '' }}">
                                {{-- PRECIO MENSUAL --}}
                                @if(!empty($mensual))
                                    <div class="precio-mensual fade-switch {{ empty($anual) ? 'show' : 'show' }}">
                                        @if(!empty($mensual['precio_oferta']))
                                            <div class="shop-item-price">
                                                <del>${{ number_format($mensual['valor'], 0, ',', '.') }}</del>
                                                ${{ number_format($mensual['precio_oferta'], 0, ',', '.') }}
                                            </div>
                                        @else
                                            <h1 class="pricing-amount">
                                                ${{ number_format($mensual['valor'], 0, ',', '.') }}
                                            </h1>
                                        @endif
                                    </div>
                                @endif
                                {{-- PRECIO ANUAL --}}
                                @if(!empty($anual))
                                    <div class="precio-anual fade-switch {{ empty($mensual) ? 'show' : '' }}">
                                        @if(!empty($anual['precio_oferta']))
                                            <div class="shop-item-price">
                                                <del>${{ number_format($anual['valor'], 0, ',', '.') }}</del>
                                                ${{ number_format($anual['precio_oferta'], 0, ',', '.') }}
                                            </div>
                                        @else
                                            <h1 class="pricing-amount">
                                                ${{ number_format($anual['valor'], 0, ',', '.') }}
                                            </h1>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="pricing-feature">
                        {{-- TEXTO PUBLICO --}}
                        @if(!empty($mensual['texto_publico']) || !empty($anual['texto_publico']))
                            {!! $mensual['texto_publico'] ?? $anual['texto_publico'] !!}
                        @endif
                        <br>
                        {{-- FORMULARIO --}}
                        <form action="{{route('cart.add')}}" method="post" class="form-agregar-carro">
                            @csrf
                            <input type="hidden" name="plan_id" class="input-plan-id" value="{{ $tipo }}_{{ $mensual['id'] ?? $anual['id'] }}">
                            <button type="submit" class="theme-btn">
                                Agregar al carro <i class='fas fa-arrow-right-long'></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('javascript')
<script>
    function cambiarPrecio(tipo,input) {
        const container = input.closest('.pricing-item');
        const preciosDiv = container.querySelector('.precios');
        const form = container.querySelector('.form-agregar-carro');
        const inputHidden = form.querySelector('.input-plan-id');

        const mensualDiv = preciosDiv.querySelector('.precio-mensual');
        const anualDiv = preciosDiv.querySelector('.precio-anual');
        const switchTextId = input.dataset.switchTextId;
        const switchLabel = document.getElementById(switchTextId);

        if (input.checked) {
            // Anual activado
            if (mensualDiv) mensualDiv.classList.remove('show');
            if (anualDiv) anualDiv.classList.add('show');

            inputHidden.value = tipo+'_'+preciosDiv.dataset.anualId;
            if (switchLabel) switchLabel.textContent = 'Anual';
        } else {
            // Mensual activado
            if (anualDiv) anualDiv.classList.remove('show');
            if (mensualDiv) mensualDiv.classList.add('show');

            inputHidden.value = tipo+'_'+preciosDiv.dataset.mensualId;
            if (switchLabel) switchLabel.textContent = 'Mensual';
        }
    }
</script>
@endsection
