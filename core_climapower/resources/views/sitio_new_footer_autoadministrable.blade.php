@extends('layouts.appsitioweb')

@section('content')
<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
				<h1>- {!! $datasitio->titulo !!}</h1>
			</div>
			<div class="col-md-4 order-1 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-end breadcrumb-light">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li class="active">{!! $datasitio->titulo !!}</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div class="row pt-1 pb-4 mb-3">
		<div class="col">
			<div class="row mt-4">
				<div class="col">
					{!! $datasitio->datatxt !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
