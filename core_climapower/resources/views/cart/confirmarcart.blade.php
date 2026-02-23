@extends('layouts.appsitiosautoadminsitioweb')

@section('content')
<div class="site-breadcrumb" style="padding-top:20px;padding-bottom:20px;">
	<div class="container" style="text-align: left;">
		<ul class="breadcrumb-menu classul">
			<li><a href="{{ url('/') }}">Home</a></li>
			<li><a href="{{ url('cart-checkout') }}">Carro de Compras</a></li>
			<li class="active">Confirmar Compra</li>
		</ul>
	</div>
</div>
<br>

@if (session('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="shop-checkout py-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="site-heading text-center">
                    <h2 class="site-title">Confirmar Carro de <span>Compras</span></h2>
                    <div class="heading-divider"></div>
                </div>
            </div>
        </div>
        <form action="{{ route('pagoflow') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-widget">
                        <h4 class="checkout-widget-title">Datos Personales</h4>
                        <div class="checkout-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" class="form-control" placeholder="Tu nombre" value="{{ old('nombre') }}" >
                                        @error('nombre')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                        <input type="text" name="apellidos" class="form-control" placeholder="Apellidos (opcional)" value="{{ old('apellidos') }}">
                                        @error('apellidos')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Tu email" value="{{ old('email') }}" >
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Celular</label>
                                        <input type="text" name="celular" class="form-control" placeholder="Tu celular (opcional)" value="{{ old('celular') }}">
                                        @error('celular')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Información adicional</label>
                                        <textarea name="informacionadicional" class="form-control" cols="30" rows="5" placeholder="Información adicional">{{ old('informacionadicional') }}</textarea>
                                        @error('informacionadicional')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout cart-summary">
                        <h4 class="mb-30">Resumen</h4>
                        <ul>
                            <li class="lihidden"><strong>Cantidad Planes:</strong> <span>{{ count(Cart::getContent()) }}</span></li>
                            <li class="cart-total lihidden"><strong>Total Pago:</strong> <span>${{ number_format($nuevototal,0,',','.') }}</span></li>
                        </ul>
                        <div class="text-end mt-40">
                            <button type="submit" class="theme-btn">
                                Confirmar Pago <i class='fas fa-arrow-right'></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
