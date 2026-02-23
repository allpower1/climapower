@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Mi Perfil</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Mi Perfil</li>
    </ul>
</div>
@endsection

@section('content')
    @if(session('success'))
    <div class="row">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
    @else
        <div class="checkout-tabs">
            <div class="row">
                <div class="col-xl-2 col-sm-3">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="tab-datos-generales-tab" data-bs-toggle="pill" href="#tab-datos-generales" role="tab" aria-controls="tab-datos-generales" aria-selected="true">
                            <i class="bx bx-edit-alt d-block check-nav-icon mt-4 mb-2"></i>
                            <p class="fw-bold mb-4">Datos Generales</p>
                        </a>
                        <a class="nav-link" id="tab-restablecer-password-tab" data-bs-toggle="pill" href="#tab-restablecer-password" role="tab" aria-controls="tab-restablecer-password" aria-selected="false">
                            <i class="bx bx-lock d-block check-nav-icon mt-4 mb-2"></i>
                            <p class="fw-bold mb-4">Contraseña</p>
                        </a>
                        <a class="nav-link" id="tab-imagen-tab" data-bs-toggle="pill" href="#tab-imagen" role="tab" aria-controls="tab-imagen" aria-selected="false">
                            <i class="bx bx-image-alt d-block check-nav-icon mt-4 mb-2"></i>
                            <p class="fw-bold mb-4">Imagen</p>
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
                                        {!! Form::open(['method' => 'PATCH','route' => ['auth.change_perfil'], 'class' => 'form-horizontal',]) !!}
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <label for="name" class="col-sm-2 control-label">{!! Form::label('name','Nombres*', ['class' => 'control-label']) !!}</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" value="<?=$user->name?>" placeholder="Nombres" required="" name="name" type="text" id="name" maxlength='191'>
                                                                    <p class="help-block"></p>
                                                                    @if($errors->has('name'))
                                                                    <p class="help-block">
                                                                        {{ $errors->first('name') }}
                                                                    </p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="last_name" class="col-sm-2 control-label">{!! Form::label('last_name','Apellido paterno*', ['class' => 'control-label']) !!}</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" value="<?=$user->last_name?>" placeholder="Apellido Paterno" required="" name="last_name" type="text" id="last_name" maxlength='191'>
                                                                    <p class="help-block"></p>
                                                                    @if($errors->has('last_name'))
                                                                    <p class="help-block">
                                                                        {{ $errors->first('last_name') }}
                                                                    </p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="mothers_last_name" class="col-sm-2 control-label">{!! Form::label('mothers_last_name','Apellido materno', ['class' => 'control-label']) !!}</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" value="<?=$user->mothers_last_name?>" placeholder="Apellido Materno" name="mothers_last_name" type="text" id="mothers_last_name" maxlength='191'>
                                                                    <p class="help-block"></p>
                                                                    @if($errors->has('mothers_last_name'))
                                                                    <p class="help-block">
                                                                        {{ $errors->first('mothers_last_name') }}
                                                                    </p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="email" class="col-sm-2 control-label">{!! Form::label('email','Correo*', ['class' => 'control-label']) !!}</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" value="<?=$user->email?>" placeholder="Correo" required="" name="email" type="text" id="email" maxlength='191'>
                                                                    <p class="help-block"></p>
                                                                    @if($errors->has('email'))
                                                                    <p class="help-block">
                                                                        {{ $errors->first('email') }}
                                                                    </p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="telefono" class="col-sm-2 control-label">{!! Form::label('telefono','Teléfono', ['class' => 'control-label']) !!}</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" value="<?=$user->phone?>" placeholder="Teléfono" name="telefono" type="text" id="telefono" maxlength='191'>
                                                                    <p class="help-block"></p>
                                                                    @if($errors->has('telefono'))
                                                                    <p class="help-block">
                                                                        {{ $errors->first('telefono') }}
                                                                    </p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-0">
                                                                <div>
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                                        Guardar
                                                                    </button>
                                                                    <a href="{{ url('/home') }}">
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
                                <div class="tab-pane fade" id="tab-restablecer-password" role="tabpanel" aria-labelledby="tab-restablecer-password-tab">
                                    <div>
                                        <h4 class="card-title">Resetear Contraseña</h4>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <h5>Recuerda que la contraseña debe tener mínimo 8 caracteres, debe incluir mayúsculas, minúsculas, números y símbolos.</h5>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                        {!! Form::open(['method' => 'PATCH','route' => ['auth.miperfil'], 'autocomplete' => 'off','class' => 'form-horizontal',]) !!}
                                                            <div class="box-body">
                                                                <div class="form-group row">
                                                                    <label for="contrasena_actual" class="col-sm-2 control-label">{!! Form::label('contrasena_actual','Contraseña actual*', ['class' => 'control-label']) !!}</label>
                                                                    <div class="col-sm-10">
                                                                        {!! Form::password('contrasena_actual', ['class' => 'form-control','placeholder' => '']) !!}
                                                                        <p class="help-block"></p>
                                                                        @if($errors->has('contrasena_actual'))
                                                                        <p class="help-block">
                                                                            {{ $errors->first('contrasena_actual') }}
                                                                        </p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="new_password" class="col-sm-2 control-label">{!! Form::label('nueva_contrasena','Nueva contraseña*', ['class' => 'control-label']) !!}</label>
                                                                    <div class="col-sm-10">
                                                                        {!! Form::password('nueva_contrasena', ['class' => 'form-control','placeholder' => '']) !!}
                                                                        <p class="help-block"></p>
                                                                        @if($errors->has('nueva_contrasena'))
                                                                        <p class="help-block">
                                                                            {{ $errors->first('nueva_contrasena') }}
                                                                        </p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="new_password_confirmation" class="col-sm-2 control-label">{!! Form::label('nueva_contrasena_confirmation','Confirmar nueva contraseña*', ['class' => 'control-label']) !!}</label>
                                                                    <div class="col-sm-10">
                                                                        {!! Form::password('nueva_contrasena_confirmation', ['class' => 'form-control','placeholder' => '']) !!}
                                                                        <p class="help-block"></p>
                                                                        @if($errors->has('nueva_contrasena_confirmation'))
                                                                        <p class="help-block">
                                                                            {{ $errors->first('nueva_contrasena_confirmation') }}
                                                                        </p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="box-footer">
                                                                <a href="{{ url('/home') }}"><button type="button" class="btn btn-default">Cancelar</button></a>
                                                                <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                                                            </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-imagen" role="tabpanel" aria-labelledby="tab-imagen-tab">
                                    <div>
                                        <h4 class="card-title mb-4">Imagen Avatar</h4>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="box-body">
                                                            <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <h5>Formato de imagen permitido (png, jpg y jpeg), tamaño maximo 2MB.</h5>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                            {!! Form::open(['method' => 'PATCH','route' => ['auth.restaurar_avatar'], 'enctype' => 'multipart/form-data','onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');", 'class' => 'form-horizontal', ]) !!}
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 control-label">Imagen actual</label>
                                                                    <div class="col-sm-10">
                                                                        <?php
                                                                            $avatar = auth()->user()->avatar;
                                                                            if($avatar != NULL and $avatar != ""){
                                                                        ?>
                                                                            <img src="{{ url('avatares/') }}/<?php echo $avatar ?>" class="img-circle" alt="User Image" style="width:150px">
                                                                        <?php }else{ ?>
                                                                            <img src="{{ url('extras/images/default.jpg') }}" class="img-circle" alt="User Image" style="width:150px">
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                    if($avatar != NULL and $avatar != ""){
                                                                ?>
                                                                {!! Form::submit(trans('Eliminar imagen'), ['class' => 'btn btn-danger']) !!}
                                                                <?php } ?>
                                                            {!! Form::close() !!}
                                                        </div>
                                                        {!! Form::open(['method' => 'PATCH','route' => ['auth.save_avatar'], 'enctype' => 'multipart/form-data','class' => 'form-horizontal' ]) !!}
                                                            <div class="box-body">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 control-label">Reemplazar imagen</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="file" class="form-control" name="imagen" id="imagen" accept="image/jpg, image/jpeg, image/png" required>
                                                                        <div id="div_mensaje_avatar" style="display:none">
                                                                            <p class="help-block">El tamaño supera el limite permitido o su formato no corresponde!</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="box-footer">
                                                                <a href="{{ url('/home') }}"><button type="button" class="btn btn-default">Cancelar</button></a>
                                                                <button type="submit" id="boton_cambiar_avatar" class="btn btn-primary pull-right" disabled="disabled">Guardar</button>
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
                    <div class="row mt-4">
                        <div class="col-sm-8">
                            <a href="<?php echo url('/home'); ?>" class="btn text-muted d-none d-sm-inline-block btn-link">
                                <i class="mdi mdi-arrow-left me-1"></i> Volver al Home
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
    @endif

@stop

@section('javascript')

<script type="text/javascript">
$(function() {
    var _URL = window.URL || window.webkitURL;
    $("#imagen").change(function(e) {
        var image, file;
        if ((file = this.files[0])) {
            var sizeByte = $('#imagen')[0].files[0].size;
            var sizekiloBytes = parseInt(sizeByte / 1024);

            var extension=$('#imagen').val().replace(/^.*\./, '');

            if(extension == "jpg" || extension == "JPG" || extension == "png" || extension == "PNG" || extension == "jpeg" || extension == "JPEG"){
                var permitido = "SI";
            }else{
                var permitido = "NO";
            }

            image = new Image();
            var fileSize = $('#imagen')[0].files[0].size;
            image.onload = function() {
                if(sizekiloBytes > 2048 ||permitido == "NO"){
                    $('#div_mensaje_avatar').show();
                    $("#boton_cambiar_avatar").attr('disabled',true);
                }else{
                    $('#div_mensaje_avatar').hide();
                    $("#boton_cambiar_avatar").attr('disabled',false);
                }
            };
            image.src = _URL.createObjectURL(file);
        }
    });
});
</script>

@endsection
