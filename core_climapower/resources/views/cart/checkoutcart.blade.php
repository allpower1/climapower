@extends('layouts.appsitiosautoadminsitioweb')

@section('content')
<div class="site-breadcrumb" style="padding-top:20px;padding-bottom:20px;">
	<div class="container" style="text-align: left;">
		<ul class="breadcrumb-menu classul">
			<li><a href="{{ url('/') }}">Home</a></li>
			<li class="active">Carro de Compras</li>
		</ul>
	</div>
</div>
<br>

@if (session('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="shop-cart py-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="site-heading text-center">
                    <h2 class="site-title">Carro de <span>Compras</span></h2>
                    <div class="heading-divider"></div>
                </div>
            </div>
        </div>
        <div class="shop-cart-wrapper">
            @if (count(Cart::getContent()))
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Plan</th>
                            <th>Precio Unitario</th>
                            <th>Cantidad</th>
                            <th>Sub Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::getContent() as $item)
                        <tr>
                            <td>
                                <h5>{{$item->name}}</h5>
                            </td>
                            <td>
                                <div class="cart-price">
                                    <span>${{ number_format($item->price,0,',','.') }}</span>
                                </div>
                            </td>
                            <td style="text-align: center;">
                                <div class="cart-qty">
                                    <form action="{{ route('cart.update') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="action" value="decrease">
                                        <button type="submit" class="minus-btn"><i class="fal fa-minus"></i></button>
                                    </form>
                                    <input class="quantity" type="text" value="{{ $item->quantity }}" disabled="">
                                    <form action="{{ route('cart.update') }}" method="POST" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="action" value="increase">
                                        <button type="submit" class="plus-btn"><i class="fal fa-plus"></i></button>
                                    </form>
                                </div>
                            </td>
                            <td>
                                <div class="cart-sub-total">
                                    <span>${{ number_format($item->price * $item->quantity,0,',','.') }}</span>
                                </div>
                            </td>
                            <td>
                                <form action="{{ route('cart.removeitem') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="theme-btn">
                                        <i class='fas fa-times'></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="cart-footer">
                <div class="row">
                    <div class="col-md-6 col-lg-4"></div>
                    <div class="col-md-6 col-lg-8">
                        <div class="cart-summary">
                            <ul>
                                <li class="lihidden"><strong>Sub Total:</strong> <span>${{ number_format(Cart::getSubTotal(),0,',','.') }}</span></li>
                                <li class="lihidden"><strong>Descuento:</strong> <span>$0</span></li>
                                <li class="cart-total lihidden"><strong>Total:</strong> <span>${{ number_format(Cart::getSubTotal(),0,',','.') }}</span></li>
                            </ul>
                            <div class="text-end mt-40">
                                <a href="{{ url('confirmar-cart') }}" class="theme-btn">Comprar Ahora<i class="fas fa-arrow-right-long"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12"><br></div>
                </div>
            </div>
            @else
                <p>Carrito vacio</p>
           @endif
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    function number_format_js(number, decimals = 0, dec_point = ',', thousands_sep = '.') {
        number = parseFloat(number).toFixed(decimals);

        let parts = number.split('.');
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep);

        return parts.join(dec_point);
    }
</script>
@endsection
