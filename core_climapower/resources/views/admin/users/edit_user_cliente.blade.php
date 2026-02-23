@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Editar Externo/Cliente</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/usuarios_externos') }}" class="text-muted text-hover-primary">Externos / Clientes</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Editar Externo/Cliente</li>
    </ul>
</div>
@endsection

@section('cssadicionales')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    .password-section {
        width: 100%;
        position: relative;
        display: inline-block;
    }

    .password-section .fa-eye {
        position: absolute;
        top: 76%;
        right: 22px;
        transform: translateY(-50%);
        cursor: pointer;
    }
    .password-section .fa-eye-slash {
        position: absolute;
        top: 76%;
        right: 22px;
        transform: translateY(-50%);
        cursor: pointer;
    }
</style>
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('status') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session('successactivacion'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('successactivacion') }}
        </div>
    @endif

    @if(session('successDatosPublicos'))
        <div class="row">
            <div class="alert alert-success">
                {{ session('successDatosPublicos') }}
            </div>
        </div>
    @endif

    @if(session('successDatosPublicidad'))
        <div class="row">
            <div class="alert alert-success">
                {{ session('successDatosPublicidad') }}
            </div>
        </div>
    @endif

    @if (session('msjerror'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('msjerror') }}
        </div>
    @endif

    @if (Session::has('message'))
        <div class="alert alert-info alert-dismissible fade show mb-0" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    @if ($errors->count() > 0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <?php
        if($gestionsitio == 'VER'){
            $disabledVista = true;
            $txtdisabledVista = 'disabled';
        }else{
            $disabledVista = false;
            $txtdisabledVista = '';
        }
    ?>

    <div class="checkout-tabs">
        <div class="row">
            <div class="col-xl-2 col-sm-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="tab-datos-generales-tab" data-bs-toggle="pill" href="#tab-datos-generales" role="tab" aria-controls="tab-datos-generales" aria-selected="true">
                        <i class="bx bx-edit-alt d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Datos Personales</p>
                    </a>
                    <a class="nav-link" id="tab-estado-aprobacion-tab" data-bs-toggle="pill" href="#tab-estado-aprobacion" role="tab" aria-controls="tab-estado-aprobacion" aria-selected="false">
                        <i class="bx bx-check-circle d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Validaciones Registro</p>
                    </a>
                    <a class="nav-link" id="tab-estado-tab" data-bs-toggle="pill" href="#tab-estado" role="tab" aria-controls="tab-estado" aria-selected="false">
                        <i class="bx bx-check-circle d-block check-nav-icon mt-4 mb-2"></i>
                        <p class="fw-bold mb-4">Estado Cuenta</p>
                    </a>
                </div>
            </div>
            <div class="col-xl-10 col-sm-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="tab-datos-generales" role="tabpanel" aria-labelledby="tab-datos-generales-tab">
                                <div>
                                    <h4 class="card-title">Datos Personales</h4>
                                    {!! Form::model($user, ['method' => 'POST','route' => ['admin.users.actualizar_user_cliente'], 'autocomplete' => 'off','class' => 'form-horizontal']) !!}
                                        <input type="hidden" name="id_usu" value="<?php echo $user->id ?>">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label for="name" class="col-sm-2 control-label">Nombres</label>
                                                            <div class="col-sm-10">
                                                                {!! Form::text('name', old('name'), ['class' => 'form-control','placeholder' => 'Nombres','maxlength' => '191', 'disabled' => $disabledVista]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="last_name" class="col-sm-2 control-label">Apellido Paterno</label>
                                                            <div class="col-sm-10">
                                                                {!! Form::text('last_name', old('last_name'), ['class' => 'form-control','placeholder' => 'Apellido Paterno','maxlength' => '191', 'disabled' => $disabledVista]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="mothers_last_name" class="col-sm-2 control-label">Apellido Materno</label>
                                                            <div class="col-sm-10">
                                                                {!! Form::text('mothers_last_name', old('mothers_last_name'), ['class' => 'form-control','placeholder' => 'Apellido Materno','maxlength' => '191', 'disabled' => $disabledVista]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="email" class="col-sm-2 control-label">Correo</label>
                                                            <div class="col-sm-10">
                                                                {!! Form::email('email', old('email'), ['class' => 'form-control','placeholder' => 'Correo','maxlength' => '191', 'disabled' => $disabledVista]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="phone" class="col-sm-2 control-label">Celular/WhatsApp</label>
                                                            <div class="col-sm-10">
                                                                {!! Form::text('phone', old('phone'), ['class' => 'form-control','placeholder' => 'Celular/WhatsApp','maxlength' => '191', 'disabled' => $disabledVista]) !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="autorizacion_concursos" class="col-sm-2 control-label">
                                                                <input type="checkbox" name="autorizacion_concursos" value="1" aria-invalid="false" class="inited" <?php if($user->autorizacion_concursos == 1) echo  "checked"; ?> {{ $txtdisabledVista }} >
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <span class="wpcf7-list-item-label">Autorizo que me incorporen en la plataforma Concursos.</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <div>
                                                                @if($txtdisabledVista != 'disabled')
                                                                <button type="submit" id="btnguardarusuario" class="btn btn-primary waves-effect waves-light mr-1">
                                                                    Guardar
                                                                </button>
                                                                @endif
                                                                <a href="{{ url('/admin/usuarios_externos') }}">
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
                                    @if($txtdisabledVista != 'disabled')
                                    <hr>
                                    <h4 class="user-profile-card-title">Resetear Contraseña</h4>
                                    <div class="col-lg-12">
                                        <div class="user-profile-form">
                                            {!! Form::open(['method' => 'PATCH','route' => ['editcliente.UpdatePassword'], 'autocomplete' => 'off','class' => 'form-horizontal',]) !!}
                                                <input type="hidden" name="iduseredit" value="<?php echo $user->id ?>">
                                                <div class="form-group password-section">
                                                    <label>Nueva Contraseña</label>
                                                    {!! Form::password('nueva_contrasena', ['id' => 'nueva_contrasena', 'class' => 'form-control','placeholder' => 'Nueva Contraseña', 'required' => 'required']) !!}
                                                    <span id="imgContrasena" data-activo="false" class="fa fa-eye"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirmar Contraseña</label>
                                                    {!! Form::password('nueva_contrasena_confirmation', ['id' => 'nueva_contrasena_confirmation', 'class' => 'form-control','placeholder' => 'Confirmar Contraseña', 'required' => 'required']) !!}
                                                </div>
                                                <button type="submit" class="btn btn-primary"><span class="far fa-key"></span> Cambiar Contraseña</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                    @endif
                                    <hr>
                                    <div class="col-lg-5">
                                        <div class="user-profile-card">
                                            <h4 class="user-profile-card-title">Adjuntar Confidencial</h4>
                                            <div class="col-lg-12">
                                                <div class="user-profile-card profile-store">
                                                    <p>Foto Selfi para verificar autenticidad con Cedula de Identidad</p>
                                                    <div class="user-profile-form">
                                                        <div class="form-group">
                                                            <img src="{{ url('extras/images/default.jpg') }}" alt="User Image">
                                                        </div>
                                                        @if($txtdisabledVista != 'disabled')
                                                        <hr>
                                                        {!! Form::open(['method' => 'PATCH','route' => ['editcliente.UpdatePersonalFotoPersonal'], 'enctype' => 'multipart/form-data','class' => 'form-horizontal' ]) !!}
                                                            <input type="hidden" name="iduseredit" value="<?php echo $user->id ?>">
                                                            <p>Formato de imagen permitido (png, jpg y jpeg), tamaño maximo 2MB.</p>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control" name="imagen" id="imagen" accept="image/jpg, image/jpeg, image/png" required>
                                                                <button type="submit" class="btn btn-primary"><span class="far fa-upload"></span> Subir imagen</button>
                                                            </div>
                                                        {!! Form::close() !!}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="user-profile-card">
                                            <h4 class="user-profile-card-title">Adjuntar Confidencial</h4>
                                            <div class="col-lg-12">
                                                <div class="user-profile-card profile-store">
                                                    <p>Foto Cedula Identidad (frontal)</p>
                                                    <div class="user-profile-form">
                                                        <div class="form-group">
                                                            <img src="{{ url('extras/images/default.jpg') }}" alt="User Image">
                                                        </div>
                                                        @if($txtdisabledVista != 'disabled')
                                                        <hr>
                                                        {!! Form::open(['method' => 'PATCH','route' => ['editcliente.UpdatePersonalCarnetFrontal'], 'enctype' => 'multipart/form-data','class' => 'form-horizontal' ]) !!}
                                                            <input type="hidden" name="iduseredit" value="<?php echo $user->id ?>">
                                                            <p>Formato de imagen permitido (png, jpg y jpeg), tamaño maximo 2MB.</p>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control" name="imagen" id="imagen" accept="image/jpg, image/jpeg, image/png" required>
                                                                <button type="submit" class="btn btn-primary"><span class="far fa-upload"></span> Subir imagen</button>
                                                            </div>
                                                        {!! Form::close() !!}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="user-profile-card">
                                            <h4 class="user-profile-card-title">Adjuntar Confidencial</h4>
                                            <div class="col-lg-12">
                                                <div class="user-profile-card profile-store">
                                                    <p>Foto Cedula Identidad (posterior)</p>
                                                    <div class="user-profile-form">
                                                        <div class="form-group">
                                                            <img src="{{ url('extras/images/default.jpg') }}" alt="User Image">
                                                        </div>
                                                        @if($txtdisabledVista != 'disabled')
                                                        <hr>
                                                        {!! Form::open(['method' => 'PATCH','route' => ['editcliente.UpdatePersonalCarnetPosterior'], 'enctype' => 'multipart/form-data','class' => 'form-horizontal' ]) !!}
                                                            <input type="hidden" name="iduseredit" value="<?php echo $user->id ?>">
                                                            <p>Formato de imagen permitido (png, jpg y jpeg), tamaño maximo 2MB.</p>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control" name="imagen" id="imagen" accept="image/jpg, image/jpeg, image/png" required>
                                                                <button type="submit" class="btn btn-primary"><span class="far fa-upload"></span> Subir imagen</button>
                                                            </div>
                                                        {!! Form::close() !!}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-estado-aprobacion" role="tabpanel" aria-labelledby="tab-estado-aprobacion-tab">
                                <div>
                                    <h4 class="card-title mb-4">Validaciones Avanzadas</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="box-body">
                                                        {!! Form::open(['method' => 'PATCH','route' => ['auth.gestionar_aprobacion_registro'], 'class' => 'form-horizontal']) !!}
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="id_usu" value="<?php echo $user->id ?>">
                                                            <div class="form-group row">
                                                                <label for="mensaje_rechazo_registro" class="col-sm-3 control-label">Observación Rechazo</label>
                                                                <div class="col-sm-9">
                                                                    <textarea name="mensaje_rechazo_registro" id="mensaje_rechazo_registro" class="form-control" placeholder="Solo completar si es rechazo" {{ $txtdisabledVista }} >{{ $user->mensaje_rechazo_registro }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <hr>
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <div>
                                                                    @if($txtdisabledVista != 'disabled')
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                                        Guardar
                                                                    </button>
                                                                    @endif
                                                                    <a href="{{ url('/admin/usuarios_externos') }}">
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
                            <div class="tab-pane fade" id="tab-estado" role="tabpanel" aria-labelledby="tab-estado-tab">
                                <div>
                                    <h4 class="card-title mb-4">Estado Cuenta Usuario</h4>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="box-body">
                                                        {!! Form::open(['method' => 'PATCH','route' => ['auth.restablecer_estado'], 'class' => 'form-horizontal']) !!}
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="id_usu" value="<?php echo $user->id ?>">
                                                            <input type="hidden" name="email" id="email" value="<?php echo $user->email ?>">
                                                            <input type="hidden" name="vista" value="cliente">
                                                            <div class="form-group row">
                                                                <label for="name" class="col-sm-2 control-label">Estado</label>
                                                                <div class="col-sm-10">
                                                                    <select name="estado_usu" id="estado_usu" class="form-control" {{ $txtdisabledVista }} >
                                                                        <option value="1" <?php if($user->status == 1) echo "selected"; ?> >Activo</option>
                                                                        <option value="0" <?php if($user->status == 0) echo "selected"; ?>>Deshabilitado</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <div>
                                                                    @if($txtdisabledVista != 'disabled')
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                                        Guardar
                                                                    </button>
                                                                    @endif
                                                                    <a href="{{ url('/admin/usuarios_externos') }}">
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
                        <a href="<?php echo url('/admin/usuarios_externos'); ?>" class="btn text-muted d-none d-sm-inline-block btn-link">
                            <i class="mdi mdi-arrow-left me-1"></i> Volver al Listado de Externos / Clientes
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

@section('javascript')
<!-- datos personales -->
 <script>
    $("#imgContrasena").click(function () {
        var control = $(this);
        var estatus = control.data('activo');
        if (estatus == false) {
            control.data('activo', true);
            $(this).removeClass('fa-eye').addClass('fa-eye-slash');
            $("#nueva_contrasena").attr('type', 'text');
            $("#nueva_contrasena_confirmation").attr('type', 'text');
        }else {
            control.data('activo', false);
            $(this).removeClass('fa-eye-slash').addClass('fa-eye');
            $("#nueva_contrasena").attr('type', 'password');
            $("#nueva_contrasena_confirmation").attr('type', 'password');
        }
    });
</script>
<!-- MASAJISTA -->
<!-- perfil publico -->
<script type="text/javascript">
    document.getElementById('username').addEventListener('keypress', function (e) {
        const char = String.fromCharCode(e.which);
        const regex = /^[a-zA-Z0-9-]+$/;
        if (!regex.test(char)) {
            e.preventDefault();
        }
    });
</script>
@endsection
