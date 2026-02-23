<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="">
<meta name="keywords" content="">
<title>{{ config('app.name', 'Laravel') }}</title>
<link rel="icon" type="image/x-icon" href="{{ url('files/images/favicon.ico') }}">
<link rel="stylesheet" href="{{ url('files/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('files/css/all-fontawesome.min.css') }}">
<link rel="stylesheet" href="{{ url('files/css/flaticon.css') }}">
<link rel="stylesheet" href="{{ url('files/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ url('files/css/magnific-popup.min.css') }}">
<link rel="stylesheet" href="{{ url('files/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ url('files/css/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ url('files/css/nice-select.min.css') }}">
<link rel="stylesheet" href="{{ url('files/css/flex-slider.min.css') }}">
<link rel="stylesheet" href="{{ url('files/css/stylesitiosautoadmin.css') }}">
<style>
    .video-background {
        position: relative; /* Necesario para posicionar el video */
        width: 100%;
        height: 100vh; /* Ajusta la altura según tus necesidades */
        overflow: hidden; /* Oculta cualquier contenido que desborde */
    }

    .video-background video {
        position: absolute; /* Posiciona el video absolutamente dentro del contenedor */
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        transform: translate(-50%, -50%);
        z-index: -1; /* Envía el video al fondo */
    }

    .video-background .contenedorvideo {
        position: relative; /* Necesario para que el contenido esté por encima del video */
        z-index: 1; /* Asegura que el contenido esté por encima del video */
        /* Estilos adicionales para el contenido */
    }
</style>
@yield('cssadicionales')
<style>
    .imagenopacidad {
        opacity: 0.7;
        transition: opacity 0.3s ease;
        border-radius: 10%;
    }

    .imagenopacidad:hover {
        opacity: 1;
    }

    .elemento-oculto-pantalla-chica {
        display: none;
    }

    @media (min-width: 850px) { /* Pantallas con ancho mínimo de 850px */
        .elemento-oculto-pantalla-chica {
            display: block;
        }
    }
</style>
<style>
    :root {
        --theme-color: #F9B134;
    }

    html .car-area {
        --theme-color: #EF1D26;
    }
</style>