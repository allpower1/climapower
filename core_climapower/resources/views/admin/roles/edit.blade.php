@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Editar Rol</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/roles') }}" class="text-muted text-hover-primary">Roles</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Editar Rol</li>
    </ul>
</div>
@endsection

@section('content')
    {!! Form::model($role, ['method' => 'PUT','route' => ['admin.roles.update', $role->id], 'autocomplete' => 'off','class' => 'form-horizontal']) !!}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 control-label">Nombre*</label>
                            <div class="col-sm-10">
                                {!! Form::text('name', old('name'), ['class' => 'form-control','placeholder' => 'Nombre','required' => '','maxlength' => '191']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                                @endif
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
                        <div class="form-group row">
                            <label for="permissiona" class="col-sm-2 control-label">Permisos</label>
                            <div class="col-sm-4">
                                <select name="permissiona[]" id="multiselect" class="form-control" size="20" multiple="multiple">
                                    <?php if($listpermissionssinasignar){ foreach ($listpermissionssinasignar as $perm) { ?>
                                    <option value="{{ $perm->name }}" data-idmodulo="{{ $perm->id_modulo }}"><?php if($perm->description != ''){ echo $perm->description; }else{ echo $perm->name; } ?></option>
                                    <?php } } ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" id="multiselect_rightAll" class="btn btn-block"><i class="bx bx-fw bx-chevrons-right"></i></button>
                                <button type="button" id="multiselect_rightSelected" class="btn btn-block"><i class="bx bx-fw bx-chevron-right"></i></button>
                                <button type="button" id="multiselect_leftSelected" class="btn btn-block"><i class="bx bx-fw bx-chevron-left"></i></button>
                                <button type="button" id="multiselect_leftAll" class="btn btn-block"><i class="bx bx-fw bx-chevrons-left"></i></button>
                            </div>
                            <div class="col-sm-4">
                                <select name="permission[]" id="multiselect_to" class="form-control" size="20" multiple="multiple">
                                    <?php if($listpermissionsasignados){ foreach ($listpermissionsasignados as $perm) { ?>
                                    <option value="{{ $perm->permiso->name }}"><?php if($perm->permiso->description != ''){ echo $perm->permiso->description; }else{ echo $perm->permiso->name; } ?></option>
                                    <?php } } ?>
                                </select>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <button type="button" id="multiselect_move_up" class="btn btn-block"><i class="bx bx-fw bx-up-arrow-alt"></i></button>
                                    </div>
                                    <div class="col-xs-6">
                                        <button type="button" id="multiselect_move_down" class="btn btn-block col-sm-6"><i class="bx bx-fw bx-down-arrow-alt"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-4">
                                <p>Los permisos editar, hacen referencia a la capacidad de edición en la descripción de cada ítem.</p>
                                <p class="help-block"></p>
                                @if($errors->has('permission'))
                                <p class="help-block">
                                    {{ $errors->first('permission') }}
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
                                <a href="{{ url('/admin/roles') }}">
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

@section('javascript')
<script src="{{ url('extras/js/multiselect.min.js') }}"></script>
<script>
    $('#multiselect').multiselect();
</script>

@endsection
