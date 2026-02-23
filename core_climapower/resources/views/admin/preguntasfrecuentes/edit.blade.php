@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Editar Pregunta Frecuente</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/preguntasfrecuentes') }}" class="text-muted text-hover-primary">Preguntas Frecuentes</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Editar Pregunta Frecuente</li>
    </ul>
</div>
@endsection

@section('content')
    {!! Form::model($preguntafrec, ['method' => 'PUT','route' => ['admin.preguntasfrecuentes.update', $preguntafrec->id], 'autocomplete' => 'off','class' => 'form-horizontal']) !!}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="pregunta" class="col-sm-2 control-label">Pregunta*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pregunta" id="pregunta" value="{{ $preguntafrec->pregunta }}" required>
                                <p class="help-block"></p>
                                @if($errors->has('pregunta'))
                                <p class="help-block">
                                    {{ $errors->first('pregunta') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="respuesta" class="col-sm-2 control-label">Respuesta*</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="respuesta" id="respuesta" required>{{ $preguntafrec->respuesta }}</textarea>
                                <p class="help-block"></p>
                                @if($errors->has('respuesta'))
                                <p class="help-block">
                                    {{ $errors->first('respuesta') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="estado" class="col-sm-2 control-label">Estado*</label>
                            <div class="col-sm-10">
                                <select id="estado" name="estado" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="1" <?php if($preguntafrec->estado == 1) echo "selected"; ?> >Activo</option>
                                    <option value="0" <?php if($preguntafrec->estado == 0) echo "selected"; ?> >Inactivo</option>
                                </select>
                                <p class="help-block"></p>
                                @if($errors->has('estado'))
                                <p class="help-block">
                                    {{ $errors->first('estado') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div style="text-align: right;">
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    Guardar
                                </button>
                                <button type="button" class="btn btn-secondary waves-effect" onclick="javascript:window.location.reload();">Deshacer</button>
                                <a href="{{ url('/admin/preguntasfrecuentes') }}">
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
