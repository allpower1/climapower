@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Editar Plan</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/planes') }}" class="text-muted text-hover-primary">Planes</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Editar Plan</li>
    </ul>
</div>
@endsection

@section('content')
    {!! Form::model($plan, ['method' => 'PUT','route' => ['admin.planes.update', $plan->id], 'autocomplete' => 'off','class' => 'form-horizontal']) !!}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="id_categoria" class="col-sm-2 control-label">Categoria</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_categoria" id="id_categoria" disabled>
                                    <option value="">Seleccione...</option>
                                    <option value="1" <?php if($plan->id_categoria == 1) echo "selected"; ?> >Masajista</option>
                                    <option value="2" <?php if($plan->id_categoria == 2) echo "selected"; ?> >Centro-Agencia</option>
                                    <option value="3" <?php if($plan->id_categoria == 3) echo "selected"; ?> >Publicidad</option>
                                </select>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id_tipo_duracion" class="col-sm-2 control-label">Duración</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_tipo_duracion" id="id_tipo_duracion" disabled>
                                    <option value="">Seleccione...</option>
                                    <option value="1" <?php if($plan->id_tipo_duracion == 1) echo "selected"; ?> >Anual</option>
                                    <option value="2" <?php if($plan->id_tipo_duracion == 2) echo "selected"; ?> >Mensual</option>
                                </select>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombre_plan" class="col-sm-2 control-label">Nombre Plan*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre_plan" id="nombre_plan" placeholder="Nombre del plan" maxlength="191" value="{{ $plan->nombre_plan }}" required>
                                <p class="help-block"></p>
                                @if($errors->has('nombre_plan'))
                                <p class="help-block">
                                    {{ $errors->first('nombre_plan') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="valor" class="col-sm-2 control-label">Valor Plan*</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="valor" id="valor" placeholder="Valor Plan" value="{{ $plan->valor }}" required>
                                <p class="help-block"></p>
                                @if($errors->has('valor'))
                                <p class="help-block">
                                    {{ $errors->first('valor') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="precio_oferta" class="col-sm-2 control-label">Precio Oferta</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="precio_oferta" id="precio_oferta" placeholder="Precio Oferta" value="{{ $plan->precio_oferta }}">
                                <p class="help-block"></p>
                                @if($errors->has('precio_oferta'))
                                <p class="help-block">
                                    {{ $errors->first('precio_oferta') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fecha_caducidad_oferta" class="col-sm-2 control-label">Fecha Caducidad Oferta</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control" name="fecha_caducidad_oferta" id="fecha_caducidad_oferta" placeholder="Fecha caducidad" value="{{ $plan->fecha_caducidad_oferta }}" >
                                <p class="help-block"></p>
                                @if($errors->has('fecha_caducidad_oferta'))
                                <p class="help-block">
                                    {{ $errors->first('fecha_caducidad_oferta') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="estado" class="col-sm-2 control-label">Estado*</label>
                            <div class="col-sm-10">
                                <select id="estado" name="estado" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="1" <?php if($plan->estado == 1) echo "selected"; ?> >Activo</option>
                                    <option value="0" <?php if($plan->estado == 0) echo "selected"; ?> >Inactivo</option>
                                </select>
                                <p class="help-block"></p>
                                @if($errors->has('estado'))
                                <p class="help-block">
                                    {{ $errors->first('estado') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        @php $arrayPlanesDetalle = [1,2,3,4,8,9,10,11,15,16,17]; @endphp
                        @if(in_array($plan->id,$arrayPlanesDetalle))
                        <div class="form-group row">
                            <label for="datatxt" class="col-sm-2 control-label">Texto Público Detalle</label>
                            <div class="col-sm-10">
                                <textarea name="datatxt" id="datatxt">{!! $plan->texto_publico !!}</textarea>
                            </div>
                        </div>
                        @endif
                        <div class="form-group mb-0">
                            <div style="text-align: right;">
                                <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                    Guardar
                                </button>
                                <button type="button" class="btn btn-secondary waves-effect" onclick="javascript:window.location.reload();">Deshacer</button>
                                <a href="{{ url('/admin/planes') }}">
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
