@extends('layouts.appsitioweb')

@section('content')
<div class="site-breadcrumb" style="padding-top:20px;padding-bottom:20px;">
    <div class="container" style="text-align: left;">
        <ul class="breadcrumb-menu">
            <li class="lihidden"><a href="{{ url('/') }}">Home</a></li>
            <li class="active lihidden">Error 504</li>
        </ul>
    </div>
</div>
<div class="error-area py-120">
    <div class="container">
        <div class="col-md-8 mx-auto">
            <div class="error-wrapper">
                <h2>Oops...</h2>
                <p>Lo sentimos, pero algo salió mal.</p>
                <a href="{{ url('/') }}" class="theme-btn">Volver al Home <i class="far fa-home"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
