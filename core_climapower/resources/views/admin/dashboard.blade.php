@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Dashboard</li>
    </ul>
</div>
@endsection

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Panel Estadístico</h2>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Total Usuarios</h6>
                    <h4>{{ $totalUsuarios }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Ingresos Históricos</h6>
                    <h4>CLP ${{ number_format($totalIngresosHistorico, 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Ingresos Mes Actual</h6>
                    <h4>CLP ${{ number_format($totalIngresosMes, 0, ',', '.') }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Planes Activos</h6>
                    <h4>{{ $planesActivos }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Planes Inactivos</h6>
                    <h4>{{ $planesInactivos }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Masajistas</h6>
                    <h4>{{ $totalMasajistas }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Agencias</h6>
                    <h4>{{ $totalAgencias }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <h6>Publicidad</h6>
                    <h4>{{ $totalPublicidad }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Usuarios registrados por mes -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header">Usuarios registrados por mes</div>
                <div class="card-body">
                    <div id="chartUsuarios"></div>
                </div>
            </div>
        </div>

        <!-- Planes vendidos por mes -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header">Planes vendidos por mes</div>
                <div class="card-body">
                    <div id="chartPlanes"></div>
                </div>
            </div>
        </div>

        <!-- Top 5 planes -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header">Top 5 planes contratados</div>
                <div class="card-body">
                    <div id="chartTopPlanes"></div>
                </div>
            </div>
        </div>

        <!-- Usuarios por región -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header">Usuarios por región</div>
                <div class="card-body">
                    <div id="chartRegion"></div>
                </div>
            </div>
        </div>

        <!-- Codigos Usados -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header">Códigos usados vs no usados</div>
                <div class="card-body">
                    <div id="chartCodigos"></div>
                </div>
            </div>
        </div>

        <!-- Ingresos por mes -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header">Ingresos por Mes (Flow)</div>
                <div class="card-body">
                    <div id="chartIngresos"></div>
                </div>
            </div>
        </div>

        <!-- Suscripciones activas -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header">Suscripciones Activas vs Inactivas</div>
                <div class="card-body">
                    <div id="chartSubs"></div>
                </div>
            </div>
        </div>

        <!-- Crecimiento total usuarios -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header">Crecimiento Total de Usuarios</div>
                <div class="card-body">
                    <div id="chartCrecimiento"></div>
                </div>
            </div>
        </div>

        <!-- Top 10 comunas -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header">Top 10 Comunas con Más Usuarios</div>
                <div class="card-body">
                    <div id="chartComunas"></div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('javascript')
<script>
    // Usuarios por mes
    var chartUsuarios = new ApexCharts(document.querySelector("#chartUsuarios"), {
        chart: { type: 'line' },
        series: [{
            name: 'Usuarios',
            data: @json($usuariosPorMes->pluck('total'))
        }],
        xaxis: { categories: @json($usuariosPorMes->pluck('mes')) }
    });
    chartUsuarios.render();

    // Planes vendidos por mes
    var chartPlanes = new ApexCharts(document.querySelector("#chartPlanes"), {
        chart: { type: 'bar' },
        series: [{
            name: 'Ventas',
            data: @json($planesPorMes->pluck('total'))
        }],
        xaxis: { categories: @json($planesPorMes->pluck('mes')) }
    });
    chartPlanes.render();

    // Top 5 planes
    var chartTopPlanes = new ApexCharts(document.querySelector("#chartTopPlanes"), {
        chart: { type: 'bar' },
        series: [{
            name: 'Contrataciones',
            data: @json($topPlanes->pluck('total'))
        }],
        xaxis: { categories: @json($topPlanes->pluck('nombre_categoria_plan')) }
    });
    chartTopPlanes.render();

    // Usuarios por región
    var chartRegion = new ApexCharts(document.querySelector("#chartRegion"), {
        chart: { type: 'bar' },
        series: [{
            name: 'Usuarios',
            data: @json($usuariosPorRegion->pluck('total'))
        }],
        xaxis: { categories: @json($usuariosPorRegion->pluck('region')) }
    });
    chartRegion.render();

    // Codigos usados
    var chartCodigos = new ApexCharts(document.querySelector("#chartCodigos"), {
        chart: { type: 'pie' },
        series: [{{ $codigos['usados'] }}, {{ $codigos['no_usados'] }}],
        labels: ['Usados', 'No usados']
    });
    chartCodigos.render();

    // Ingresos
    new ApexCharts(document.querySelector("#chartIngresos"), {
        chart: { type: 'area' },
        series: [{ name: 'Ingresos', data: @json($ingresosPorMes->pluck('total')) }],
        xaxis: { categories: @json($ingresosPorMes->pluck('mes')) }
    }).render();

    // Subscripciones activas
    new ApexCharts(document.querySelector("#chartSubs"), {
        chart: { type: 'pie' },
        series: [{{ $subsActivas }}, {{ $subsInactivas }}],
        labels: ['Activas', 'Inactivas']
    }).render();

    // Crecimiento total de usuarios
    new ApexCharts(document.querySelector("#chartCrecimiento"), {
        chart: { type: 'area' },
        series: [{ name: 'Usuarios', data: @json($crecimientoUsuarios->pluck('total')) }],
        xaxis: { categories: @json($crecimientoUsuarios->pluck('mes')) }
    }).render();

    // Top comunas
    new ApexCharts(document.querySelector("#chartComunas"), {
        chart: { type: 'bar' },
        series: [{ name: 'Usuarios', data: @json($topComunas->pluck('total')) }],
        xaxis: { categories: @json($topComunas->pluck('comuna')) }
    }).render();

</script>
@endsection
