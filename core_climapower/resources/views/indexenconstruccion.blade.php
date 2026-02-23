<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>TU LADO VIP</title>
        <meta content="Tu Lado VIP" name="description" />
        <meta content="Tu Lado VIP" name="author" />
        <link rel="icon" type="image/x-icon" href="{{ url('files/images/favicon.ico') }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="dns-prefetch" href="//fonts.bunny.net" />
        <meta name="description" content="Somos un portal exclusivo de Chile, Esta plataforma es solamente publicitaria, y no tenemos relación alguna con los servicios de cada profesional/empresa suscriptos.">
        <style>
            body {
                margin: 0;
                height: 100%;
                width: 100%;
                overflow: hidden;
            }

            #myVideo {
                position: fixed;
            }

            .content {
                position: fixed;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                color: #f1f1f1;
                width: 100%;
                padding: 0px;
            }

            @media (min-aspect-ratio: 16/9) {
                video {
                    width: 100%;
                    height: auto;
                }
            }

            @media (max-aspect-ratio: 16/9) {
                video {
                    width: auto;
                    height: 100%;
                }
            }
        </style>
    </head>
    <body>
        <video class="embed-responsive-item" autoplay muted loop id="myVideo" name="Tu Lado VIP">
            <source src="{{ url('files/videos/HomeTULADOVIP.mov') }}">
            Tu navegador no es compatible con videos HTML5
        </video>
        <div class="content">
            <h1>TU LADO VIP</h1>
        </div>
    </body>
</html>