@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Nueva Conversación</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/chat') }}" class="text-muted text-hover-primary">Chats</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Nueva Conversación</li>
    </ul>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h3>Iniciar nueva conversación</h3>
                    <form action="{{ route('chat.start') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título de la conversación</label>
                            <input type="text" id="titulo" name="titulo" class="form-control" required>
                        </div>

                        @if(auth()->user()->is_admin)
                            <div class="mb-3">
                                <label for="user_id" class="form-label">Enviar a:</label>
                                <select name="user_id" id="user_id" class="form-control select2" required>
                                    <option value="">Selecciona un usuario</option>
                                    @foreach($users as $u)
                                        <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->email }})</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <input type="hidden" name="user_id" value="1">
                        @endif

                        <button type="submit" class="btn btn-success">Crear conversación</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
