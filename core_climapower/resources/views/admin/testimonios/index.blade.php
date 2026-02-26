@inject('request','Illuminate\Http\Request')

@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Testimonios</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Testimonios</li>
    </ul>
</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Listado de Testimonios</h4>
                    <?php
                        $mensaje_alerta = "¿Estás seguro que deseas eliminar este testimonio?";
                    ?>
                    <div class="panel-body table-responsive">
                        <table id="tabla_general_datatable_roles" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <th><input type="checkbox" id="allcheckboxroles"></th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Cargo</th>
                                <th>Testimonio</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @if (count($listtestimonios) > 0)
                                @foreach ($listtestimonios as $testimonio)
                                <tr class="trfilasroles" data-entry-id="{{ $testimonio->id }}">
                                    <td><input type="checkbox" class="inputcheckboxroles" onclick="comprobarCheckboxRoles()"></td>
                                    <td style="text-align: center;">{{ $testimonio->id }}</td>
                                    <td style="text-align: center;">{{ $testimonio->nombre }}</td>
                                    <td style="text-align: center;">{{ $testimonio->email }}</td>
                                    <td style="text-align: center;">{{ $testimonio->cargo }}</td>
                                    <td style="text-align: center;">{{ (mb_strlen($testimonio->testimonio) > 40) ? mb_substr($testimonio->testimonio, 0, 40) . '...' : $testimonio->testimonio; }}</td>
                                    <td style="text-align: center;">
                                        <?php
                                            if($testimonio->estado == 1){
                                                echo "<span class='badge badge-success'>Aprobado</span>";
                                            }else{
                                                echo "<span class='badge badge-danger'>Pendiente</span>";
                                            }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="{{ url('admin/testimonio/editar',[$testimonio->id]) }}" class="btn btn-sm btn-info">Gestionar</a>
                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'GET',
                                        'onsubmit' => "return confirm('".trans("$mensaje_alerta")."');",
                                        'url' => ['admin/testimonio/eliminar', $testimonio->id])) !!}
                                        {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-sm btn-danger')) !!}
                                        {!! Form::close() !!}
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
