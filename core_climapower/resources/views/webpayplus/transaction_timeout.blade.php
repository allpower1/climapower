@extends('layouts.appsitioweb')

@section('content')
<div class="site-breadcrumb" style="padding-top:20px;padding-bottom:20px;">
	<div class="container" style="text-align: left;">
		<ul class="breadcrumb-menu">
			<li><a href="{{ url('/') }}">Home</a></li>
			<li class="active">Estado Compra</li>
		</ul>
	</div>
</div>
<div class="login-area py-5">
    <div class="container">
        <div class="col-md-12 mx-auto">
            <div class="login-form">
                <h1 class="page_title" style="font-size: 50px;">Transacción fuera de tiempo</h1>
                <div class="page_info">
                    <h3 class="page_subtitle">Oops...</h3>
                    <p class="page_description">El pago fue anulado por tiempo de espera.</p>
                    <a href="{{ url('/') }}" class="btn btn-primary go_home theme-btn" style="width: 200px;">Página Principal</a>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
