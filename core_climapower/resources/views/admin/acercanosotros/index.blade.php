@inject('request','Illuminate\Http\Request')

@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Acerca Nosotros</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Acerca Nosotros</li>
    </ul>
</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Administrador Acerca Nosotros</h4>
                    <div class="panel-body table-responsive">
                        <table id="tabla_general_datatable_roles" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <th><input type="checkbox" id="allcheckboxroles"></th>
                                <th>ID</th>
                                <th>HTML 1° Parte</th>
                                <th>HTML 2° Parte</th>
                                <th>HTML 3° Parte</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @if (count($listacercanosotros) > 0)
                                @foreach ($listacercanosotros as $dataan)
                                <tr class="trfilasroles" data-entry-id="{{ $dataan->id }}">
                                    <td><input type="checkbox" class="inputcheckboxroles" onclick="comprobarCheckboxRoles()"></td>
                                    <td style="text-align: center;">{{ $dataan->id }}</td>
                                    <td style="text-align: center;"><?php if($dataan->texto_primera_parte != '' && $dataan->texto_primera_parte != null) echo "SI"; else echo "NO"; ?></td>
                                    <td style="text-align: center;"><?php if($dataan->texto_segunda_parte != '' && $dataan->texto_segunda_parte != null) echo "SI"; else echo "NO"; ?></td>
                                    <td style="text-align: center;"><?php if($dataan->texto_tercera_parte != '' && $dataan->texto_tercera_parte != null) echo "SI"; else echo "NO"; ?></td>
                                    <td style="text-align: center;">
                                        <a href="{{ route('admin.acercanosotros.edit',[$dataan->id]) }}" class="btn btn-sm btn-info">@lang('global.app_edit')</a>
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
