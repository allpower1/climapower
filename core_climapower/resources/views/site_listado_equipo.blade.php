@extends('layouts.appsitioweb')

@section('content')
<section class="page-header page-header-modern bg-color-quaternary page-header-md custom-page-header">
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
				<h1>- Nuestro Equipo</h1>
			</div>
			<div class="col-md-4 order-1 order-md-2 align-self-center">
				<ul class="breadcrumb d-block text-md-end breadcrumb-light">
					<li><a href="{{ url('/') }}">Home</a></li>
					<li class="active">Nuestro Equipo</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="section-secondary custom-section-padding">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="row team-list sort-destination" data-sort-id="team">
					@if($listequipo)
						@forelse ($listequipo as $indexequipo => $equipo)
							<div class="col-md-4 isotope-item leadership">
								<div class="team-item mb-4 p-0 pb-2">
									<a href="{{ url('/equipo/'.$equipo->id) }}" class="text-decoration-none">
										<span class="image-wrapper">
											@if($equipo->adjunto)
												<img src="{{ url('fileequipo/'.$equipo->adjunto) }}" alt="" class="img-fluid" style="width:600px;height:355px;">
											@else
												<img src="{{ url('img/demos/business-consulting/team/team-1.jpg') }}" alt="" class="img-fluid" />
											@endif
										</span>
									</a>
									<div class="team-infos">
										<a href="{{ url('/equipo/'.$equipo->id) }}" class="text-decoration-none">
											<span class="team-member-name text-color-dark font-weight-semibold text-4">{{ $equipo->nombre_completo }}</span>
											<span class="team-member-desc font-weight-light">{{ $equipo->cargo }}</span>
										</a>
									</div>
								</div>
							</div>
						@empty
							<p>No existen registros de equipos.</p>
						@endforelse
					@endif
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
