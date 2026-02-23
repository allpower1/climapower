@inject('request','Illuminate\Http\Request')

@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Visitas</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Visitas</li>
    </ul>
</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Listado de Visitas</h4>
                    <h1>Estadísticas de Visitas</h1>
                    <p><strong>Total de visitas:</strong> {{ $visitasTotales }}</p>
                    <p><strong>Visitas hoy:</strong> {{ $visitasHoy }}</p>
                    <p><strong>IPs únicas totales:</strong> {{ $ipsUnicasTotales }}</p>
                    <p><strong>IPs únicas hoy:</strong> {{ $ipsUnicasHoy }}</p>
                    <h2>Visitas por Página</h2>
                    <div class="panel-body table-responsive">
                        <table id="tabla_general_datatable_roles" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <th>Página</th>
                                <th>Visitas</th>
                            </thead>
                            <tbody>
                                @if (count($porPagina ) > 0)
                                @foreach ($porPagina  as $pagina)
                                <tr>
                                    <td style="text-align: center;">{{ $pagina->url }}</td>
                                    <td style="text-align: center;">{{ $pagina->total }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
