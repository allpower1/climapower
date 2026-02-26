@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Editar Slider Home</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/sliderhome') }}" class="text-muted text-hover-primary">Slider Home</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Editar Slider Home</li>
    </ul>
</div>
@endsection

@section('content')
    {!! Form::model($sliderhome, ['method' => 'PUT','route' => ['admin.sliderhome.update', $sliderhome->id], 'autocomplete' => 'off', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}

        @include('partials.alerts')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Imagen Actual</label>
                            <div class="col-sm-10">
                                @if($sliderhome->imagen)
                                    <img src="{{ url('filesliderhome/'.$sliderhome->imagen) }}" alt="" style="width:100px;">
                                @else
                                    <img src="{{ url('img/demos/business-consulting/team/team-1.jpg') }}" alt="" style="width:100px;">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adjuntoimagen" class="col-sm-2 control-label">Imagen (1920x874)</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="adjuntoimagen" id="adjuntoimagen" style="margin-top: 10px;" accept="image/png,image/jpg,image/jpeg">
                                <p class="help-block"></p>
                                @if($errors->has('adjuntoimagen'))
                                <p class="help-block">
                                    {{ $errors->first('adjuntoimagen') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="titulo_parte_1" class="col-sm-2 control-label">Titulo 1° Parte*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="titulo_parte_1" id="titulo_parte_1" value="{{ $sliderhome->titulo_parte_1 }}" placeholder="Titulo primera parte" required>
                                <p class="help-block"></p>
                                @if($errors->has('titulo_parte_1'))
                                <p class="help-block">
                                    {{ $errors->first('titulo_parte_1') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="titulo_parte_2" class="col-sm-2 control-label">Titulo 2° Parte*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="titulo_parte_2" id="titulo_parte_2" value="{{ $sliderhome->titulo_parte_2 }}" placeholder="Titulo segunda parte" required>
                                <p class="help-block"></p>
                                @if($errors->has('titulo_parte_2'))
                                <p class="help-block">
                                    {{ $errors->first('titulo_parte_2') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="texto_boton" class="col-sm-2 control-label">Texto Botón</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="texto_boton" id="texto_boton" value="{{ $sliderhome->texto_boton }}" placeholder="Texto Botón">
                                <p class="help-block"></p>
                                @if($errors->has('texto_boton'))
                                <p class="help-block">
                                    {{ $errors->first('texto_boton') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url_boton" class="col-sm-2 control-label">URL Botón (http:// o https://)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="url_boton" id="url_boton" value="{{ $sliderhome->url_boton }}" placeholder="URL Botón incluir http:// o https://">
                                <p class="help-block"></p>
                                @if($errors->has('url_boton'))
                                <p class="help-block">
                                    {{ $errors->first('url_boton') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="estado" class="col-sm-2 control-label">Estado*</label>
                            <div class="col-sm-10">
                                <select id="estado" name="estado" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="1" <?php if($sliderhome->estado == 1) echo "selected"; ?> >Activo</option>
                                    <option value="0" <?php if($sliderhome->estado == 0) echo "selected"; ?> >Inactivo</option>
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
                                <a href="{{ url('/admin/sliderhome') }}">
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
