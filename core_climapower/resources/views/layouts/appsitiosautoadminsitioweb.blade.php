<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths">
<head>
    @include('sitioweb.headsitiosautoadmin')
    <style>
        body.modal-mayoredad-abierto {
            overflow: hidden;
            pointer-events: none;
        }

        body.modal-mayoredad-abierto,
        body.modal-mayoredad-abierto .adp-popup,
        body.modal-mayoredad-abierto .adp-popup * {
            pointer-events: all;
        }

        .bloquear-scroll,
        .bloquear-scroll body,
        .bloquear-scroll html {
            overflow: hidden !important;
            height: 100% !important;
        }

        .fondooscurobody {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 9998;
        }
    </style>
</head>
<body class="bloquear-scroll modal-mayoredad-abierto">
    <div class="preloader" style="display: none;">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <div id="posicioncontenido" class="fondooscurobody">
        @include('sitioweb.header')
        <main class="main">
            @yield('content')
        </main>
        @include('sitioweb.footer')
    </div>
    @include('sitioweb.javascript')
</body>
</html>