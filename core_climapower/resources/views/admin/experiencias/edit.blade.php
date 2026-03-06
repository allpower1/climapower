@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Editar Experiencia</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/experiencias') }}" class="text-muted text-hover-primary">Nuestras Experiencias</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Editar Experiencia</li>
    </ul>
</div>
@endsection

@section('content')
    {!! Form::model($experiencia, ['method' => 'PUT','route' => ['admin.experiencias.update', $experiencia->id], 'autocomplete' => 'off', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}

        @include('partials.alerts')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="adjuntoexperiencia" class="col-sm-2 control-label">Imagen Actual</label>
                            <div class="col-sm-10">
                                @if($experiencia->adjunto)
                                    <img src="{{ url('fileexperiencia/'.$experiencia->adjunto) }}" alt="" style="width:100px;">
                                @else
                                    <img src="{{ url('img/demos/business-consulting/expertise/expertise-1.jpg') }}" alt="" style="width:100px;">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adjuntoexperiencia" class="col-sm-2 control-label">Imagen (111x106)*</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="adjuntoexperiencia" id="adjuntoexperiencia" style="margin-top: 10px;" accept="image/png,image/jpg,image/jpeg">
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
                                <input type="text" class="form-control" name="titulo" id="titulo" value="{{ $experiencia->titulo }}" required>
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
                                <input type="text" class="form-control" name="subtitulo" id="subtitulo" value="{{ $experiencia->subtitulo }}" required>
                                <p class="help-block"></p>
                                @if($errors->has('subtitulo'))
                                <p class="help-block">
                                    {{ $errors->first('subtitulo') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="datatxt" class="col-sm-2 control-label">Descripción*</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="descripcion" id="datatxt">{!! $experiencia->descripcion !!}</textarea>
                                <p class="help-block"></p>
                                @if($errors->has('descripcion'))
                                <p class="help-block">
                                    {{ $errors->first('descripcion') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="estado" class="col-sm-2 control-label">Estado*</label>
                            <div class="col-sm-10">
                                <select id="estado" name="estado" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="1" <?php if($experiencia->estado == 1) echo "selected"; ?> >Activo</option>
                                    <option value="0" <?php if($experiencia->estado == 0) echo "selected"; ?> >Inactivo</option>
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
