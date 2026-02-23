@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Detalle Chats</h1>
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
        <li class="breadcrumb-item text-muted">Detalle Chats</li>
    </ul>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h4>{{ $conversation->titulo }}</h4>
                    <div class="chat-box p-3 mb-3" style="height:400px; overflow-y:auto; background:#f9f9f9; border-radius:8px;">
                        @foreach($conversation->messages as $msg)
                            <div class="mb-2 {{ $msg->user_id == auth()->id() ? 'text-end' : 'text-start' }}">
                                <div class="{{ $msg->user_id == auth()->id() ? 'bg-primary text-white' : 'bg-light' }} p-2 rounded-3 d-inline-block">
                                    <strong>{{ $msg->user->name }}</strong><br>
                                    {{ $msg->message }}
                                </div>
                                <small class="text-muted d-block">{{ $msg->created_at->format('H:i') }}</small>
                            </div>
                        @endforeach
                    </div>
                    <form action="{{ route('chat.send', $conversation->id) }}" method="POST" class="mt-3">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="message" class="form-control" placeholder="Escribe un mensaje...">
                            <button class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                    <hr>
                    <div class="form-group mb-0">
                        <div style="text-align: right;">
                            <button type="button" class="btn btn-secondary waves-effect" onclick="javascript:window.location.reload();">Deshacer</button>
                            <a href="{{ url('/chat') }}">
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
</div>
@endsection
