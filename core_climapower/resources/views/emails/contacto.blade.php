@component('mail::message')
# Estimados(as)
Se ha generado un contacto desde el sitio web TuLadoVIP.CL con la siguiente información:
<br><br>
Nombre Completo: {{ $demo->nombre_completo }}
<br>
Email: {{ $demo->email }}
<br>
Celular: {{ $demo->phone }}
<br>
Asunto: {{ $demo->subject }}
<br>
Mensaje: {{ $demo->mensaje }}

Saludos cordiales,<br>
{{ config('app.name') }}
@endcomponent
