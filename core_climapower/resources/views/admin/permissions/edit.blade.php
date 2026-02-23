@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Editar Permiso</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/permissions') }}" class="text-muted text-hover-primary">Permisos</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Editar Permiso</li>
    </ul>
</div>
@endsection

@section('content')
    {!! Form::model($permission, ['method' => 'PUT','route' => ['admin.permissions.update', $permission->id], 'autocomplete' => 'off','class' => '']) !!}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input value="<?php echo $permission->name ?>" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="modulo" class="col-sm-2 control-label">Módulo</label>
                            <div class="col-sm-10">
                                <select id="modulo" name="modulo" class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="0" <?php if($permission->id_modulo == 0) echo 'selected'; ?> >Configuración Avanzada</option>
                                    <?php if($listmodulosempresa){ foreach ($listmodulosempresa as $modemp) { ?>
                                        <option value="{{ $modemp->id_modulo }}" <?php if($permission->id_modulo == $modemp->id_modulo) echo 'selected'; ?> >{{ $modemp->modulo->nombre }}</option>
                                    <?php } } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-10">
                                {!! Form::text('description', old('description'), ['class' => 'form-control','placeholder' => 'Descripción','maxlength' => '191']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('description'))
                                <p class="help-block">
                                    {{ $errors->first('description') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    Guardar
                                </button>
                                <a href="{{ url('/admin/permissions') }}">
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
