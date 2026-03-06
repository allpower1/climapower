@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Editar Acerca de Nosotros</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/acercanosotros') }}" class="text-muted text-hover-primary">Acerca de Nosotros</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Editar Acerca de Nosotros</li>
    </ul>
</div>
@endsection

@section('content')
    {!! Form::model($dataan, ['method' => 'PUT','route' => ['admin.acercanosotros.update', $dataan->id], 'autocomplete' => 'off', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}

        @include('partials.alerts')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- primera imagen -->
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">1° Imagen Actual</label>
                            <div class="col-sm-10">
                                @if($dataan->imagen_uno)
                                    <img src="{{ url('fileacercanosotros/'.$dataan->imagen_uno) }}" alt="" style="width:100px;">
                                @else
                                    <img src="{{ url('img/demos/business-consulting/cases/case-3.jpg') }}" alt="" style="width:100px;">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adjuntoprimeraimagen" class="col-sm-2 control-label">1° Imagen (371px x 255px)</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="adjuntoprimeraimagen" id="adjuntoprimeraimagen" style="margin-top: 10px;" accept="image/png,image/jpg,image/jpeg">
                                <p class="help-block"></p>
                                @if($errors->has('adjuntoprimeraimagen'))
                                <p class="help-block">
                                    {{ $errors->first('adjuntoprimeraimagen') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <!-- segunda imagen -->
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">2° Imagen Actual</label>
                            <div class="col-sm-10">
                                @if($dataan->imagen_dos)
                                    <img src="{{ url('fileacercanosotros/'.$dataan->imagen_dos) }}" alt="" style="width:100px;">
                                @else
                                    <img src="{{ url('img/demos/business-consulting/cases/case-3.jpg') }}" alt="" style="width:100px;">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adjuntosegundaimagen" class="col-sm-2 control-label">2° Imagen (371px x 255px)</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="adjuntosegundaimagen" id="adjuntosegundaimagen" style="margin-top: 10px;" accept="image/png,image/jpg,image/jpeg">
                                <p class="help-block"></p>
                                @if($errors->has('adjuntosegundaimagen'))
                                <p class="help-block">
                                    {{ $errors->first('adjuntosegundaimagen') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <!-- tercera imagen -->
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">3° Imagen Actual</label>
                            <div class="col-sm-10">
                                @if($dataan->imagen_tres)
                                    <img src="{{ url('fileacercanosotros/'.$dataan->imagen_tres) }}" alt="" style="width:100px;">
                                @else
                                    <img src="{{ url('img/demos/business-consulting/cases/case-3.jpg') }}" alt="" style="width:100px;">
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adjuntoterceraimagen" class="col-sm-2 control-label">3° Imagen (371px x 255px)</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="adjuntoterceraimagen" id="adjuntoterceraimagen" style="margin-top: 10px;" accept="image/png,image/jpg,image/jpeg">
                                <p class="help-block"></p>
                                @if($errors->has('adjuntoterceraimagen'))
                                <p class="help-block">
                                    {{ $errors->first('adjuntoterceraimagen') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="texto_primera_parte" class="col-sm-2 control-label">Primera Parte HTML*</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="texto_primera_parte" id="texto_primera_parte">{!! $dataan->texto_primera_parte !!}</textarea>
                                <p class="help-block"></p>
                                @if($errors->has('texto_primera_parte'))
                                <p class="help-block">
                                    {{ $errors->first('texto_primera_parte') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="texto_segunda_parte" class="col-sm-2 control-label">Segunda Parte HTML*</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="texto_segunda_parte" id="texto_segunda_parte">{!! $dataan->texto_segunda_parte !!}</textarea>
                                <p class="help-block"></p>
                                @if($errors->has('texto_segunda_parte'))
                                <p class="help-block">
                                    {{ $errors->first('texto_segunda_parte') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="texto_tercera_parte" class="col-sm-2 control-label">Tercera Parte HTML*</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="texto_tercera_parte" id="texto_tercera_parte">{!! $dataan->texto_tercera_parte !!}</textarea>
                                <p class="help-block"></p>
                                @if($errors->has('texto_tercera_parte'))
                                <p class="help-block">
                                    {{ $errors->first('texto_tercera_parte') }}
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
                                <a href="{{ url('/admin/acercanosotros') }}">
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
