@inject('request','Illuminate\Http\Request')

@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Slider Home</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Slider Home</li>
    </ul>
</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Listado de Slider Home</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <a href="{{ route('admin.sliderhome.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
                            </p>
                        </div>
                    </div>
                    <?php
                        $mensaje_alerta = "¿Estás seguro que deseas eliminar este slider home?";
                    ?>
                    <div class="panel-body table-responsive">
                        <table id="tabla_general_datatable_roles" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <th><input type="checkbox" id="allcheckboxroles"></th>
                                <th>ID</th>
                                <th>Titulo Parte 1</th>
                                <th>Titulo Parte 2</th>
                                <th>Texto Botón</th>
                                <th>URL Botón</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @if (count($listsliderhome) > 0)
                                @foreach ($listsliderhome as $sliderhome)
                                <tr class="trfilasroles" data-entry-id="{{ $sliderhome->id }}">
                                    <td><input type="checkbox" class="inputcheckboxroles" onclick="comprobarCheckboxRoles()"></td>
                                    <td style="text-align: center;">{{ $sliderhome->id }}</td>
                                    <td style="text-align: center;">{{ (mb_strlen($sliderhome->titulo_parte_1) > 40) ? mb_substr($sliderhome->titulo_parte_1, 0, 40) . '...' : $sliderhome->titulo_parte_1; }}</td>
                                    <td style="text-align: center;">{{ (mb_strlen($sliderhome->titulo_parte_2) > 40) ? mb_substr($sliderhome->titulo_parte_2, 0, 40) . '...' : $sliderhome->titulo_parte_2; }}</td>
                                    <td style="text-align: center;">{{ $sliderhome->texto_boton }}</td>
                                    <td style="text-align: center;">{{ $sliderhome->url_boton }}</td>
                                    <td style="text-align: center;">
                                        <?php
                                            if($sliderhome->estado == 1){
                                                echo "<span class='badge badge-success'>Activo</span>";
                                            }else{
                                                echo "<span class='badge badge-danger'>Inactivo</span>";
                                            }
                                        ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <a href="{{ route('admin.sliderhome.edit',[$sliderhome->id]) }}" class="btn btn-sm btn-info">@lang('global.app_edit')</a>
                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("$mensaje_alerta")."');",
                                        'route' => ['admin.sliderhome.destroy', $sliderhome->id])) !!}
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
