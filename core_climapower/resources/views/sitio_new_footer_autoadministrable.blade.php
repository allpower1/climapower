@extends('layouts.appsitiosautoadminsitioweb')
@inject('request','Illuminate\Http\Request')

@section('content')
<div class="site-breadcrumb" style="padding-top:20px;padding-bottom:20px;">
	<div class="container" style="text-align: left;">
		<ul class="breadcrumb-menu classul">
			<li><a href="{{ url('/') }}">Home</a></li>
			<li class="active">{!! $datasitio->titulo !!}</li>
		</ul>
	</div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="">
                    <h3>{!! $datasitio->titulo !!}</h3>
                    <p>
                        {!! $datasitio->datatxt !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- inicio membresias_masajistas -->
@if($request->segment(1) == 'membresias_masajistas')
<div class="pricing-area py-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="site-heading text-center">
                    <h2 class="site-title">Nuestros <span>Planes</span></h2>
                    <div class="heading-divider"></div>
                </div>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-md-6 col-lg-3">
                <div class="pricing-item">
                    <div class="pricing-header">
                        <div class="pricing-header-content">
                            <h4>Plan Base</h4>
                            <p class="pricing-duration">Duración Mensual</p>
                            @if($detallePlanCinco->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanCinco->valor,0,',','.') }}</del> ${{ number_format($detallePlanCinco->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanCinco->valor,0,',','.') }}</h1>
                            @endif
                            <p class="pricing-duration">Duración Anual</p>
                            @if($detallePlanUno->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanUno->valor,0,',','.') }}</del> ${{ number_format($detallePlanUno->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanUno->valor,0,',','.') }}</h1>
                            @endif
                        </div>
                    </div>
                    <div class="pricing-feature">
                        @if($detallePlanUno)
                        @if($detallePlanUno->texto_publico_new != null && $detallePlanUno->texto_publico_new != '')
                        {!! $detallePlanUno->texto_publico_new !!}
                        @endif
                        @endif
                        <br>
                        <a href="{{ url('registro') }}" class="theme-btn">Comprar <i class="fas fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="pricing-item">
                    <div class="pricing-header">
                        <div class="pricing-header-content">
                            <h4>Plan Destacada</h4>
                            <p class="pricing-duration">Duración Mensual</p>
                            @if($detallePlanSeis->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanSeis->valor,0,',','.') }}</del> ${{ number_format($detallePlanSeis->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanSeis->valor,0,',','.') }}</h1>
                            @endif
                            <p class="pricing-duration">Duración Anual</p>
                            @if($detallePlanDos->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanDos->valor,0,',','.') }}</del> ${{ number_format($detallePlanDos->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanDos->valor,0,',','.') }}</h1>
                            @endif
                        </div>
                    </div>
                    <div class="pricing-feature">
                        @if($detallePlanDos)
                        @if($detallePlanDos->texto_publico_new != null && $detallePlanDos->texto_publico_new != '')
                        {!! $detallePlanDos->texto_publico_new !!}
                        @endif
                        @endif
                        <br>
                        <a href="{{ url('registro') }}" class="theme-btn">Comprar <i class="fas fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="pricing-item">
                    <div class="pricing-header">
                        <div class="pricing-header-content">
                            <h4>Plan Oferta del Día</h4>
                            <p class="pricing-duration">Duración Mensual</p>
                            @if($detallePlanSiete->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanSiete->valor,0,',','.') }}</del> ${{ number_format($detallePlanSiete->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanSiete->valor,0,',','.') }}</h1>
                            @endif
                            <p class="pricing-duration">Duración Anual</p>
                            @if($detallePlanTres->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanTres->valor,0,',','.') }}</del> ${{ number_format($detallePlanTres->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanTres->valor,0,',','.') }}</h1>
                            @endif
                        </div>
                    </div>
                    <div class="pricing-feature">
                        @if($detallePlanTres)
                        @if($detallePlanTres->texto_publico_new != null && $detallePlanTres->texto_publico_new != '')
                        {!! $detallePlanTres->texto_publico_new !!}
                        @endif
                        @endif
                        <br>
                        <a href="{{ url('registro') }}" class="theme-btn">Comprar <i class="fas fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="pricing-item">
                    <div class="pricing-header">
                        <div class="pricing-header-content">
                            <h4>Oferta Plan Anual Full</h4>
                            <p class="pricing-duration">Duración Anual</p>
                            @if($detallePlanCuatro->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanCuatro->valor,0,',','.') }}</del> ${{ number_format($detallePlanCuatro->precio_oferta,0,',','.') }}</div>
                            @else
                                @if($detallePlanCuatro->valor)
                                    <h1 class="pricing-amount">${{ number_format($detallePlanCuatro->valor,0,',','.') }}</h1>
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="pricing-feature">
                        @if($detallePlanCuatro)
                        @if($detallePlanCuatro->texto_publico_new != null && $detallePlanCuatro->texto_publico_new != '')
                        {!! $detallePlanCuatro->texto_publico_new !!}
                        @endif
                        @endif
                        <br>
                        <a href="{{ url('registro') }}" class="theme-btn">Comprar <i class="fas fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- fin membresias_masajistas -->
<!-- inicio membresias_agencias -->
@if($request->segment(1) == 'membresias_agencias')
<div class="pricing-area py-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="site-heading text-center">
                    <h2 class="site-title">Nuestros <span>Planes</span></h2>
                    <div class="heading-divider"></div>
                </div>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-md-6 col-lg-3">
                <div class="pricing-item">
                    <div class="pricing-header">
                        <div class="pricing-header-content">
                            <h4>Plan Banner un click</h4>
                            <p class="pricing-duration">Duración Anual</p>
                            @if($detallePlanOcho->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanOcho->valor,0,',','.') }}</del> ${{ number_format($detallePlanOcho->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanOcho->valor,0,',','.') }}</h1>
                            @endif
                        </div>
                    </div>
                    <div class="pricing-feature">
                        @if($detallePlanOcho)
                        @if($detallePlanOcho->texto_publico_new != null && $detallePlanOcho->texto_publico_new != '')
                        {!! $detallePlanOcho->texto_publico_new !!}
                        @endif
                        @endif
                        <br>
                        <a href="{{ url('registro') }}" class="theme-btn">Comprar <i class="fas fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="pricing-item">
                    <div class="pricing-header">
                        <div class="pricing-header-content">
                            <h4>Oferta del día</h4>
                            <p class="pricing-duration">Duración Anual</p>
                            @if($detallePlanNueve->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanNueve->valor,0,',','.') }}</del> ${{ number_format($detallePlanNueve->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanNueve->valor,0,',','.') }}</h1>
                            @endif
                        </div>
                    </div>
                    <div class="pricing-feature">
                        @if($detallePlanNueve)
                        @if($detallePlanNueve->texto_publico_new != null && $detallePlanNueve->texto_publico_new != '')
                        {!! $detallePlanNueve->texto_publico_new !!}
                        @endif
                        @endif
                        <br>
                        <a href="{{ url('registro') }}" class="theme-btn">Comprar <i class="fas fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="pricing-item">
                    <div class="pricing-header">
                        <div class="pricing-header-content">
                            <h4>Plan Perfil Básico</h4>
                            <p class="pricing-duration">Duración Anual</p>
                            @if($detallePlanDiez->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanDiez->valor,0,',','.') }}</del> ${{ number_format($detallePlanDiez->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanDiez->valor,0,',','.') }}</h1>
                            @endif
                        </div>
                    </div>
                    <div class="pricing-feature">
                        @if($detallePlanDiez)
                        @if($detallePlanDiez->texto_publico_new != null && $detallePlanDiez->texto_publico_new != '')
                        {!! $detallePlanDiez->texto_publico_new !!}
                        @endif
                        @endif
                        <br>
                        <a href="{{ url('registro') }}" class="theme-btn">Comprar <i class="fas fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="pricing-item">
                    <div class="pricing-header">
                        <div class="pricing-header-content">
                            <h4>Plan Perfil Interconexiones</h4>
                            <p class="pricing-duration">Duración Anual</p>
                            <h5>+ 5 Interconexiones</h5>
                            @if($detallePlanOnce->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanOnce->valor,0,',','.') }}</del> ${{ number_format($detallePlanOnce->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanOnce->valor,0,',','.') }}</h1>
                            @endif
                            <h5>+ 10 Interconexiones</h5>
                            <p class="pricing-duration">Duración Anual</p>
                            @if($detallePlanDoce->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanDoce->valor,0,',','.') }}</del> ${{ number_format($detallePlanDoce->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanDoce->valor,0,',','.') }}</h1>
                            @endif
                            <h5>+ 20 Interconexiones</h5>
                            <p class="pricing-duration">Duración Anual</p>
                            @if($detallePlanTrece->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanTrece->valor,0,',','.') }}</del> ${{ number_format($detallePlanTrece->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanTrece->valor,0,',','.') }}</h1>
                            @endif
                            <h5>+ 30 Interconexiones</h5>
                            <p class="pricing-duration">Duración Anual</p>
                            @if($detallePlanCatorce->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanCatorce->valor,0,',','.') }}</del> ${{ number_format($detallePlanCatorce->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanCatorce->valor,0,',','.') }}</h1>
                            @endif
                        </div>
                    </div>
                    <div class="pricing-feature">
                        @if($detallePlanOnce)
                        @if($detallePlanOnce->texto_publico_new != null && $detallePlanOnce->texto_publico_new != '')
                        {!! $detallePlanOnce->texto_publico_new !!}
                        @endif
                        @endif
                        <br>
                        <a href="{{ url('registro') }}" class="theme-btn">Comprar <i class="fas fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- fin membresias_agencias -->
 <!-- inicio membresias_publicidad -->
@if($request->segment(1) == 'membresias_publicidad')
<div class="pricing-area py-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="site-heading text-center">
                    <h2 class="site-title">Nuestros <span>Planes</span></h2>
                    <div class="heading-divider"></div>
                </div>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-md-6 col-lg-4">
                <div class="pricing-item">
                    <div class="pricing-header">
                        <div class="pricing-header-content">
                            <h4>Plan Banner un click</h4>
                            <p class="pricing-duration">Duración Mensual</p>
                            @if($detallePlanQuince->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanQuince->valor,0,',','.') }}</del> ${{ number_format($detallePlanQuince->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanQuince->valor,0,',','.') }}</h1>
                            @endif
                        </div>
                    </div>
                    <div class="pricing-feature">
                        @if($detallePlanQuince)
                        @if($detallePlanQuince->texto_publico_new != null && $detallePlanQuince->texto_publico_new != '')
                        {!! $detallePlanQuince->texto_publico_new !!}
                        @endif
                        @endif
                        <br>
                        <a href="{{ url('registro') }}" class="theme-btn">Comprar <i class="fas fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="pricing-item">
                    <div class="pricing-header">
                        <div class="pricing-header-content">
                            <h4>Plan Banner un click</h4>
                            <p class="pricing-duration">Duración Anual</p>
                            @if($detallePlanDieciseis->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanDieciseis->valor,0,',','.') }}</del> ${{ number_format($detallePlanDieciseis->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanDieciseis->valor,0,',','.') }}</h1>
                            @endif
                        </div>
                    </div>
                    <div class="pricing-feature">
                        @if($detallePlanDieciseis)
                        @if($detallePlanDieciseis->texto_publico_new != null && $detallePlanDieciseis->texto_publico_new != '')
                        {!! $detallePlanDieciseis->texto_publico_new !!}
                        @endif
                        @endif
                        <br>
                        <a href="{{ url('registro') }}" class="theme-btn">Comprar <i class="fas fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="pricing-item">
                    <div class="pricing-header">
                        <div class="pricing-header-content">
                            <h4>Plan Banner un click Alianza</h4>
                            <p class="pricing-duration">Duración Anual</p>
                            @if($detallePlanDiecisiete->precio_oferta)
                            <div class="shop-item-price"><del>${{ number_format($detallePlanDiecisiete->valor,0,',','.') }}</del> ${{ number_format($detallePlanDiecisiete->precio_oferta,0,',','.') }}</div>
                            @else
                            <h1 class="pricing-amount">${{ number_format($detallePlanDiecisiete->valor,0,',','.') }}</h1>
                            @endif
                        </div>
                    </div>
                    <div class="pricing-feature">
                        @if($detallePlanDiecisiete)
                        @if($detallePlanDiecisiete->texto_publico_new != null && $detallePlanDiecisiete->texto_publico_new != '')
                        {!! $detallePlanDiecisiete->texto_publico_new !!}
                        @endif
                        @endif
                        <br>
                        <a href="{{ url('registro') }}" class="theme-btn">Comprar <i class="fas fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<!-- fin membresias_publicidad -->

@include('sitioweb.seccionvisitasycomparte')
@endsection
