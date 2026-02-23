@inject('request','Illuminate\Http\Request')

@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Admin Footer</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Admin Footer</li>
    </ul>
</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Listado de Secciones Footer</h4>
                    <div class="panel-body table-responsive">
                        <table id="tabla_general_datatable_roles" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <th><input type="checkbox" id="allcheckboxroles"></th>
                                <th>ID</th>
                                <th>Sección</th>
                                <th>URL SITIO WEB</th>
                                <th>Titulo</th>
                                <th>Gestión Vista</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @if (count($adminfooters) > 0)
                                @foreach ($adminfooters as $foot)
                                <tr class="trfilasroles" data-entry-id="{{ $foot->id }}">
                                    <td><input type="checkbox" class="inputcheckboxroles" onclick="comprobarCheckboxRoles()"></td>
                                    <td style="text-align: center;">{{ $foot->id }}</td>
                                    <td style="text-align: center;">{{ $foot->seccion }}</td>
                                    <td style="text-align: center;">{{ $foot->urlsitio }}</td>
                                    <td style="text-align: center;">{!! $foot->titulo !!}</td>
                                    <td style="text-align: center;"><?php if($foot->datatxt != '' && $foot->datatxt != null) echo "SI"; else echo "NO"; ?></td>
                                    <td style="text-align: center;">
                                        <a href="{{ url('admin/footer/editar',$foot->id) }}" class="btn btn-sm btn-info">@lang('global.app_edit')</a>
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
