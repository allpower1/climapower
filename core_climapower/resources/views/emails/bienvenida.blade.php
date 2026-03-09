@component('mail::message')
# Bienvenida(o) {{ $demo->nombre_completo }}
Se ha creado una nueva cuenta en el sitio web ClimaPower.CL relacionado a su cuenta de correo {{ $demo->email }} con la siguiente información:
<br>
Gracias por tu registro
<br>

Saludos cordiales,<br>
{{ config('app.name') }}
@endcomponent