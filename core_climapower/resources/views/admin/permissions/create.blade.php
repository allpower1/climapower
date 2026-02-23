@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Crear Permiso</h1>
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
        <li class="breadcrumb-item text-muted">Crear Permiso</li>
    </ul>
</div>
@endsection

@section('content')
    {!! Form::open(['method' => 'POST','route' => ['admin.permissions.store'], 'autocomplete' => 'off','class' => 'form-horizontal']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <br>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nombre*</label>
                                <div class="col-sm-10">
                                    {!! Form::text('name', old('name'), ['class' => 'form-control','placeholder' => 'Nombre','required' => '']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('name'))
                                    <p class="help-block">
                                        {{ $errors->first('name') }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-sm-2 control-label">Descripción</label>
                                <div class="col-sm-10">
                                    {!! Form::text('description', old('title'), ['class' => 'form-control','placeholder' => 'Descripción','maxlength' => '191']) !!}
                                    <p class="help-block"></p>
                                    @if($errors->has('description'))
                                    <p class="help-block">
                                        {{ $errors->first('description') }}
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <a href="{{ url('/') }}/admin/permissions"><button type="button" class="btn btn-default">Cancelar</button></a>
                            <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    {!! Form::close() !!}
@stop

@section('javascript')

@endsection
