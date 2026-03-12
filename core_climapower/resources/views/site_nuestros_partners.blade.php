@extends('layouts.appsitioweb')

@section('content')
<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                <h1>- Nuestros Partners</h1>
            </div>
            <div class="col-md-4 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-end breadcrumb-light">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Nuestros Partners</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="container py-4">
    <div class="row">
        <div class="col">
            <h2 class="font-weight-normal text-7 mb-2">Nuestros <strong class="font-weight-extra-bold">Partners</strong></h2>
            <p class="lead">
                {!! $datasitio->datatxt !!}
            </p>
        </div>
    </div>
</div>
<div class="container py-4">
    @if($listpartners)
        @forelse ($listpartners as $indexpartner => $partner)
            <div class="row">
                {{-- Imagen primero si es par --}}
                @if($loop->even)
                    <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInLeftShorter">
                        <img src="img/team/team-2.jpg" class="img-fluid" alt="">
                    </div>
                @endif
                <div class="col-md-7 order-2">
                    <div class="overflow-hidden">
                        <h2 class="text-color-dark font-weight-bold text-8 mb-0 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">{{ $partner->nombre_completo }}</h2>
                    </div>
                    <div class="overflow-hidden mb-3">
                        <p class="font-weight-bold text-primary text-uppercase mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="500">{{ $partner->cargo }}</p>
                    </div>
                    <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">{!! $partner->descripcion_breve !!}</p>
                    <p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">{!! $partner->descripcion !!}</p>
                    <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
                </div>
                {{-- Imagen después si es impar --}}
                @if($loop->odd)
                    <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
                        <img src="img/team/team-1.jpg" class="img-fluid" alt="">
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col">
                    <hr class="solid my-5">
                </div>
            </div>
        @empty
            <p>No existen registros de partners.</p>
        @endforelse
    @endif
</div>
@endsection
