@extends('layouts.app')

@section('contentHeader')
<div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">Chats</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('/admin/home') }}" class="text-muted text-hover-primary">Inicio</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-500 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">Chats</li>
    </ul>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <h3>Chats</h3>
                    <hr>
                    <a href="{{ route('chat.nueva_conversacion') }}" class="btn btn-primary mb-3">Iniciar nueva conversación</a>
                    <hr>
                    @foreach($conversations as $conv)
                        @php
                            $unread = $conv->unreadMessagesFor(auth()->id());
                        @endphp
                        <a href="{{ route('chat.show', $conv->id) }}" style="text-decoration:none;">
                            <div class="card mb-2 {{ $unread > 0 ? 'border-primary bg-light fw-bold' : '' }}">
                                <div class="card-body">
                                    @if(auth()->user()->is_admin)
                                        <strong>{{ $conv->users->pluck('name')->join(', ') }}</strong><br>
                                    @endif
                                    <strong>{{ $conv->titulo ?? 'Sin título' }}</strong><br>
                                    <small>
                                        {{ optional($conv->messages->last())->message ?? 'Sin mensajes aún' }}
                                    </small>
                                    @if($unread > 0)
                                        <span class="badge bg-primary float-end" style="color:white">{{ $unread }} nuevo(s)</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
