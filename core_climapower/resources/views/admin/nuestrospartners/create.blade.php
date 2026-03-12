@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Crear Partner</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/nuestrospartners') }}" class="text-muted text-hover-primary">Nuestros Partners</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Crear Partner</li>
    </ul>
</div>
@endsection

@section('content')
    {!! Form::open(['method' => 'POST','route' => ['admin.nuestrospartners.store'], 'autocomplete' => 'off', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}

        @include('partials.alerts')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="adjuntopartner" class="col-sm-2 control-label">Imagen (800x800)*</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="adjuntopartner" id="adjuntopartner" style="margin-top: 10px;" accept="image/png,image/jpg,image/jpeg" required>
                                <p class="help-block"></p>
                                @if($errors->has('adjuntopartner'))
                                <p class="help-block">
                                    {{ $errors->first('adjuntopartner') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombre_completo" class="col-sm-2 control-label">Nombre Completo*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre_completo" id="nombre_completo" placeholder="Nombre Completo" required>
                                <p class="help-block"></p>
                                @if($errors->has('nombre_completo'))
                                <p class="help-block">
                                    {{ $errors->first('nombre_completo') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cargo" class="col-sm-2 control-label">Cargo*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Cargo" required>
                                <p class="help-block"></p>
                                @if($errors->has('cargo'))
                                <p class="help-block">
                                    {{ $errors->first('cargo') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefono" class="col-sm-2 control-label">Telefono*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required>
                                <p class="help-block"></p>
                                @if($errors->has('telefono'))
                                <p class="help-block">
                                    {{ $errors->first('telefono') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 control-label">Email*</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email" required>
                                <p class="help-block"></p>
                                @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcion_breve" class="col-sm-2 control-label">Descripción Breve*</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="descripcion_breve" id="descripcion_breve"></textarea>
                                <p class="help-block"></p>
                                @if($errors->has('descripcion_breve'))
                                <p class="help-block">
                                    {{ $errors->first('descripcion_breve') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descripcion" class="col-sm-2 control-label">Descripción*</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="descripcion" id="descripcion" onfocus="descripcion"></textarea>
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
                                <a href="{{ url('/admin/nuestrospartners') }}">
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
