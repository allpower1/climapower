@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Editar Usuario</h1>
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
        <li class="breadcrumb-item text-muted">Editar Usuario</li>
    </ul>
</div>
@endsection

@section('content')
    <div class="checkout-tabs">
        <div class="row">
            <div class="col-xl-2 col-sm-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="tab-datos-generales-tab" data-bs-toggle="pill" href="#tab-datos-generales" role="tab" aria-controls="tab-datos-generales" aria-selected="true">
                        <i class="bx bx-edit-alt d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Datos Generales</p>
                    </a>
                    <a class="nav-link" id="tab-estado-tab" data-bs-toggle="pill" href="#tab-estado" role="tab" aria-controls="tab-estado" aria-selected="false">
                        <i class="bx bx-check-circle d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Estado</p>
                    </a>
                </div>
            </div>
            <div class="col-xl-10 col-sm-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="tab-datos-generales" role="tabpanel" aria-labelledby="tab-datos-generales-tab">
                                <div>
                                    <h4 class="card-title">Datos Generales</h4>
                                    {!! Form::model($user, ['method' => 'PUT','route' => ['admin.users.update', $user->id], 'autocomplete' => 'off','class' => 'form-horizontal']) !!}
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
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
                                                        @if(!$user->hasRole('Usuario General'))
                                                        <div class="form-group row">
                                                            <label for="roles" class="col-sm-2 control-label">Perfil*</label>
                                                            <div class="col-sm-10">
                                                                {!! Form::select('roles[]', $roles, old('roles') ? old('roles') : $user->roles()->pluck('name','name'), ['id' => 'roles','class' => 'form-control select2','required' => '','multiple' => 'multiple']) !!}
                                                                <p class="help-block"></p>
                                                                @if($errors->has('roles'))
                                                                <p class="help-block">
                                                                    {{ $errors->first('roles') }}
                                                                </p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @endif
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
                                    <hr>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-estado" role="tabpanel" aria-labelledby="tab-estado-tab">
                                <div>
                                    <h4 class="card-title mb-4">Estado Usuario</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="box-body">
                                                        {!! Form::open(['method' => 'PATCH','route' => ['auth.restablecer_estado'], 'class' => 'form-horizontal']) !!}
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="id_usu" value="<?php echo $user->id ?>">
                                                            <input type="hidden" name="email" id="email" value="<?php echo $user->email ?>">
                                                            <div class="form-group row">
                                                                <label for="name" class="col-sm-2 control-label">Estado</label>
                                                                <div class="col-sm-10">
                                                                    <select name="estado_usu" id="estado_usu" class="form-control">
                                                                        <option value="1" <?php if($user->status == 1) echo "selected"; ?> >Activo</option>
                                                                        <option value="0" <?php if($user->status == 0) echo "selected"; ?>>Deshabilitado</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <div>
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                                        Guardar
                                                                    </button>
                                                                    <a href="{{ url('/admin/users') }}">
                                                                        <button type="button" class="btn btn-secondary waves-effect">
                                                                            Cancelar
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-8">
                        <a href="<?php echo url('/admin/users'); ?>" class="btn text-muted d-none d-sm-inline-block btn-link">
                            <i class="mdi mdi-arrow-left me-1"></i> Volver al Listado de Usuarios
                        </a>
                    </div>
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-2">
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
@stop
