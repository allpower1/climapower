@inject('request','Illuminate\Http\Request')
@inject('modelModulo','App\Models\Modulos')

@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Permisos</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Permisos</li>
    </ul>
</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Listado de Permisos</h4>
                    <div class="panel-body table-responsive">
                        <table id="tabla_general_datatable" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <th>Nombre</th>
                                <th>Módulo</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @if (count($permissions) > 0)
                                @foreach ($permissions as $permission)
                                <tr data-entry-id="{{ $permission->id }}">
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <?php
                                            $idmodulo = $permission->id_modulo;
                                            if($idmodulo == '0'){
                                                echo 'Configuración Avanzada';
                                            }else{
                                                $existsmodulo = $modelModulo->where('id',$idmodulo)->exists();
                                                if($existsmodulo){
                                                    $getmodulo = $modelModulo->where('id',$idmodulo)->first();
                                                    echo $getmodulo->nombre;
                                                }
                                            }
                                        ?>
                                    </td>
                                    <td>{{ $permission->description }}</td>
                                    <td>
                                        <a href="{{ route('admin.permissions.edit',[$permission->id]) }}" class="btn btn-sm btn-info">@lang('global.app_edit')</a>
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

@section('javascript')

@endsection
