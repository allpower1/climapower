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
            <center>
                <div class="login-form">
                    <h1 class="page_title" style="font-size: 50px;">Compra exitosa</h1>
                    <div class="page_info">
                        <p class="page_description">Muchas gracias pro su compra</p>
                        <br>
                        <a href="{{ url('/') }}" class="btn btn-primary go_home theme-btn" style="width: 200px;">Página Principal</a>
                    </div>
                </div>
            </center>
        </div>
    </div>
</div>
<br>
@endsection
