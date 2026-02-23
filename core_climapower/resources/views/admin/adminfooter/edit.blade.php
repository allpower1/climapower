@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Editar Sección Footer</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/footer') }}" class="text-muted text-hover-primary">Admin Footer</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Editar Sección Footer</li>
    </ul>
</div>
@endsection

@section('content')
    <form method="post" action="{{ url('admin/footer/actualizar') }}">
        @csrf
        <input type="hidden" name="idregistro" value="{{ $adminfooter->id }}">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="datatxt" class="col-sm-2 control-label">Titulo*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="titulo" id="titulo" value="{{ $adminfooter->titulo }}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="datatxt" class="col-sm-2 control-label">Data Menú*</label>
                            <div class="col-sm-10">
                                <textarea name="datatxt" id="datatxt">{!! $adminfooter->datatxt !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div style="text-align: right;">
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    Guardar
                                </button>
                                <button type="button" class="btn btn-secondary waves-effect" onclick="javascript:window.location.reload();">Deshacer</button>
                                <a href="{{ url('/admin/footer') }}">
                                    <button type="button" class="btn btn-secondary waves-effect">
                                        Cancelar
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@section('javascript')

@endsection
