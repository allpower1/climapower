@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Crear Palabra Buscador</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/palabrasbuscador') }}" class="text-muted text-hover-primary">Palabras Buscador</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Crear Palabra Buscador</li>
    </ul>
</div>
@endsection

@section('content')
    {!! Form::open(['method' => 'POST','route' => ['admin.palabrasbuscador.store'], 'autocomplete' => 'off','class' => 'form-horizontal']) !!}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="palabra" class="col-sm-2 control-label">Palabra*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="palabra" id="palabra" required>
                                <p class="help-block"></p>
                                @if($errors->has('palabra'))
                                <p class="help-block">
                                    {{ $errors->first('palabra') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div style="text-align: right;">
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    Guardar
                                </button>
                                <a href="{{ url('/admin/palabrasbuscador') }}">
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
    {!! Form::close() !!}
@stop
