@component('mail::message')
# Estimada(o) {{ $demo->nombre_completo }}
Error, has utilizado un código de descuento erróneo en el sitio web TuLadoVIP.CL
<br>

Saludos cordiales,<br>
{{ config('app.name') }}
@endcomponent