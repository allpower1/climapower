@extends('layouts.appsitioweb')

@section('content')
<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
				<h1>- Error 504</h1>
			</div>
			<div class="col-md-4 order-1 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-end breadcrumb-light">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li class="active">Error 504</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div class="row pt-1 pb-5 mb-3">
		<div class="col">
			<div class="row mb-3">
				<div class="col">
					<div class="feature-box custom-feature-box custom-feature-box-active feature-box-style-2">
						<div class="feature-box-info ms-3">
                            <center>
                                <h2>Oops...</h2>
                                <p>Lo sentimos, pero algo salió mal.</p>
                                <a href="{{ url('/') }}" class="btn btn-primary">Volver al Home <i class="icon-home icons"></i></a>
                            </center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
