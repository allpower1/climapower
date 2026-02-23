@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Crear Experiencia</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/experiencias') }}" class="text-muted text-hover-primary">Experiencias</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Crear Experiencia</li>
    </ul>
</div>
@endsection

@section('content')
    {!! Form::open(['method' => 'POST','route' => ['admin.experiencias.store'], 'autocomplete' => 'off', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}

        @include('partials.alerts')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="adjuntoexperiencia" class="col-sm-2 control-label">Imagen*</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="adjuntoexperiencia" id="adjuntoexperiencia" style="margin-top: 10px;" accept="image/png,image/jpg,image/jpeg" required>
                                <p class="help-block"></p>
                                @if($errors->has('adjuntoexperiencia'))
                                <p class="help-block">
                                    {{ $errors->first('adjuntoexperiencia') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="titulo" class="col-sm-2 control-label">Titulo*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="titulo" id="titulo" required>
                                <p class="help-block"></p>
                                @if($errors->has('titulo'))
                                <p class="help-block">
                                    {{ $errors->first('titulo') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="subtitulo" class="col-sm-2 control-label">SubTitulo*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="subtitulo" id="subtitulo" required>
                                <p class="help-block"></p>
                                @if($errors->has('subtitulo'))
                                <p class="help-block">
                                    {{ $errors->first('subtitulo') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcion" class="col-sm-2 control-label">Descripción*</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
                                <p class="help-block"></p>
                                @if($errors->has('descripcion'))
                                <p class="help-block">
                                    {{ $errors->first('descripcion') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div style="text-align: right;">
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    Guardar
                                </button>
                                <a href="{{ url('/admin/experiencias') }}">
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
