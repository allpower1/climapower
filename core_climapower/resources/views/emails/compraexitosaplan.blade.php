@component('mail::message')
# Estimada(o) {{ $demo->nombre_completo }}
Hemos recibido satisfactoriamente tu pago y registro, en el sitio web ClimaPower.CL
<br>
Gracias por tu compra y registro
<br>

Saludos cordiales,<br>
{{ config('app.name') }}
@endcomponent