@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Editar Testimonio</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/testimonios') }}" class="text-muted text-hover-primary">Testimonios</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Editar Testimonio</li>
    </ul>
</div>
@endsection

@section('content')
    {!! Form::model($testimonio, ['method' => 'POST','url' => ['admin/testimonio/actualizar', $testimonio->id], 'autocomplete' => 'off','class' => 'form-horizontal']) !!}

        @include('partials.alerts')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $testimonio->nombre }}" disabled>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $testimonio->email }}" disabled>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Cargo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $testimonio->cargo }}" disabled>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Imagen</label>
                            <div class="col-sm-10">
                                @if($testimonio->imagen)
                                    <img src="{{ url('filetestimonio/'.$testimonio->imagen) }}" alt class="img-fluid custom-rounded-image"/>
                                @else
                                    <img src="{{ url('img/demos/business-consulting/testimonials/testimonial-author-2.jpg') }}" alt class="img-fluid custom-rounded-image" />
                                @endif
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Testimonio</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" disabled>{{ $testimonio->testimonio }}</textarea>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="estado" class="col-sm-2 control-label">Estado*</label>
                            <div class="col-sm-10">
                                <select id="estado" name="estado" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    <option value="1" <?php if($testimonio->estado == 1) echo "selected"; ?> >Aprobado</option>
                                    <option value="0" <?php if($testimonio->estado == 0) echo "selected"; ?> >Pendiente</option>
                                </select>
                                <p class="help-block"></p>
                                @if($errors->has('estado'))
                                <p class="help-block">
                                    {{ $errors->first('estado') }}
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
                                <a href="{{ url('/admin/testimonios') }}">
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
