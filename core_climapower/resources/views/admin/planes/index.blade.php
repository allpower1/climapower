@inject('request','Illuminate\Http\Request')

@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Planes</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Planes</li>
    </ul>
</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Listado de Planes</h4>
                    <div class="panel-body table-responsive">
                        <table id="tabla_general_datatable_roles" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <th><input type="checkbox" id="allcheckboxroles"></th>
                                <th>ID</th>
                                <th>Categoria</th>
                                <th>Duración</th>
                                <th>Nombre Plan</th>
                                <th>Valor</th>
                                <th>Precio Oferta</th>
                                <th>Caducidad Oferta</th>
                                <th>Detalle Público</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @if (count($listplanes) > 0)
                                @foreach ($listplanes as $plan)
                                <tr class="trfilasroles" data-entry-id="{{ $plan->id }}">
                                    <td><input type="checkbox" class="inputcheckboxroles" onclick="comprobarCheckboxRoles()"></td>
                                    <td style="text-align: center;">{{ $plan->id }}</td>
                                    <td style="text-align: center;">
                                        <?php
                                            if($plan->id_categoria == 1){
                                                echo 'VIP';
                                            }elseif($plan->id_categoria == 2){
                                                echo "Centro-Agencia";
                                            }elseif($plan->id_categoria == 3){
                                                echo "Publicidad";
                                            }else{
                                                echo "--";
                                            }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                            if($plan->id_tipo_duracion == 1){
                                                echo "Anual";
                                            }elseif($plan->id_tipo_duracion == 2){
                                                echo "Mensual";
                                            }else{
                                                echo "--";
                                            }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">{{ $plan->nombre_plan }}</td>
                                    <td style="text-align: center;">${{ number_format($plan->valor,0,',','.') }}</td>
                                    <td style="text-align: center;">${{ number_format($plan->precio_oferta,0,',','.') }}</td>
                                    <td style="text-align: center;">{{ $plan->fecha_caducidad_oferta }}</td>
                                    <td style="text-align: center;"><?php if($plan->texto_publico != '' && $plan->texto_publico != null) echo "SI"; else echo "NO"; ?></td>
                                    <td style="text-align: center;">
                                        <?php
                                            if($plan->estado == 1){
                                                echo "<span class='badge badge-success'>Activo</span>";
                                            }else{
                                                echo "<span class='badge badge-danger'>Inactivo</span>";
                                            }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="{{ route('admin.planes.edit',[$plan->id]) }}" class="btn btn-sm btn-info">@lang('global.app_edit')</a>
                                    </td>
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
