@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Editar Sección Contacto/Otros</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Editar Sección Contacto/Otros</li>
    </ul>
</div>
@endsection

@section('content')
    <form class="form-horizontal" method="post" action="{{ url('admin/admincontactootros/actualizar') }}" enctype="multipart/form-data">
        @csrf

        @include('partials.alerts')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="telefono" class="col-sm-2 control-label">Teléfono*</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="telefono" id="telefono" value="{{ $admincontactootros->telefono }}"/>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email" value="{{ $admincontactootros->email }}"/>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="nuestra_ubicacion" class="col-sm-2 control-label">Nuestra Ubicación</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nuestra_ubicacion" id="nuestra_ubicacion" value="{{ $admincontactootros->nuestra_ubicacion }}"/>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="rrss_facebook" class="col-sm-2 control-label">RRSS Facebook</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="rrss_facebook" id="rrss_facebook" value="{{ $admincontactootros->rrss_facebook }}"/>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="rrss_twitter" class="col-sm-2 control-label">RRSS Twitter</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="rrss_twitter" id="rrss_twitter" value="{{ $admincontactootros->rrss_twitter }}"/>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="rrss_instagram" class="col-sm-2 control-label">RRSS Instagram</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="rrss_instagram" id="rrss_instagram" value="{{ $admincontactootros->rrss_instagram }}"/>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="rrss_linkedin" class="col-sm-2 control-label">RRSS Linkedin</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="rrss_linkedin" id="rrss_linkedin" value="{{ $admincontactootros->rrss_linkedin }}"/>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="anios_negocio" class="col-sm-2 control-label">Años en el negocio</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="anios_negocio" id="anios_negocio" value="{{ $admincontactootros->anios_negocio }}"/>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="casos_exitos" class="col-sm-2 control-label">Casos de exito</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="casos_exitos" id="casos_exitos" value="{{ $admincontactootros->casos_exitos }}"/>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="clientes_satisfechos" class="col-sm-2 control-label">Clientes satisfechos</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="clientes_satisfechos" id="clientes_satisfechos" value="{{ $admincontactootros->clientes_satisfechos }}"/>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="consultores_profesionales" class="col-sm-2 control-label">Consultores profesionales</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="consultores_profesionales" id="consultores_profesionales" value="{{ $admincontactootros->consultores_profesionales }}"/>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Imagen Fondo Footer Actual</label>
                            <div class="col-sm-10">
                                @if($admincontactootros->adjunto_fondo_footer)
                                    <img src="{{ url('filefondofooter/'.$admincontactootros->adjunto_fondo_footer) }}" alt="" style="width:350px;">
                                @else
                                    <img src="{{ url('img/demos/business-consulting/contact/contact-background.jpg') }}" alt="" style="width:350px;">
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="adjuntofondofooter" class="col-sm-2 control-label">Imagen Fondo Footer (1920x584)</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="adjuntofondofooter" id="adjuntofondofooter" style="margin-top: 10px;" accept="image/png,image/jpg,image/jpeg">
                                <p class="help-block"></p>
                                @if($errors->has('adjuntofondofooter'))
                                <p class="help-block">
                                    {{ $errors->first('adjuntofondofooter') }}
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
                                <a href="{{ url('/admin/admincontactootros') }}">
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
    </form>
@stop
