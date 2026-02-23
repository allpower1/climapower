@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Crear Usuario</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/users') }}" class="text-muted text-hover-primary">Usuarios</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Crear Usuario</li>
    </ul>
</div>
@endsection

@section('content')
    {!! Form::open(['method' => 'POST','route' => ['admin.users.store'], 'autocomplete' => 'off','class' => 'form-horizontal']) !!}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 control-label">Pass*</label>
                            <div class="col-sm-10">
                                {!! Form::text('password', old('password'), ['class' => 'form-control','placeholder' => 'Password','required' => '','maxlength' => '191']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('password'))
                                <p class="help-block">
                                {{ $errors->first('password') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 control-label">Nombres*</label>
                            <div class="col-sm-10">
                                {!! Form::text('name', old('name'), ['class' => 'form-control','placeholder' => 'Nombres','required' => '','maxlength' => '191']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-2 control-label">Apellido Paterno*</label>
                            <div class="col-sm-10">
                                {!! Form::text('last_name', old('last_name'), ['class' => 'form-control','placeholder' => 'Apellido Paterno','required' => '','maxlength' => '191']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('last_name'))
                                <p class="help-block">
                                    {{ $errors->first('last_name') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mothers_last_name" class="col-sm-2 control-label">Apellido Materno</label>
                            <div class="col-sm-10">
                                {!! Form::text('mothers_last_name', old('mothers_last_name'), ['class' => 'form-control','placeholder' => 'Apellido Materno','maxlength' => '191']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('mothers_last_name'))
                                <p class="help-block">
                                    {{ $errors->first('mothers_last_name') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 control-label">Correo*</label>
                            <div class="col-sm-10">
                                {!! Form::email('email', old('email'), ['class' => 'form-control','placeholder' => 'Correo','required' => '','maxlength' => '191']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 control-label">Teléfono</label>
                            <div class="col-sm-10">
                                {!! Form::text('phone', old('phone'), ['class' => 'form-control','placeholder' => 'Teléfono','maxlength' => '191']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('phone'))
                                <p class="help-block">
                                    {{ $errors->first('phone') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="roles" class="col-sm-2 control-label">Perfil*</label>
                            <div class="col-sm-10">
                                {!! Form::select('roles[]', $roles, old('roles'), ['id' => 'roles','class' => 'form-control select2','required' => '','multiple' => 'multiple']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('roles'))
                                <p class="help-block">
                                    {{ $errors->first('roles') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" id="btnguardarusuario" class="btn btn-primary waves-effect waves-light mr-1">
                                    Guardar
                                </button>
                                <a href="{{ url('/admin/users') }}">
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
