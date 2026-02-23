@component('mail::message')
# Hola {{ $plan->getuser->name }}

Te informamos que tu plan **{{ $plan->getplan->nombre_plan }}** vence en 5 días (**{{ $plan->activo_hasta }}**).

Si deseas renovarlo, puedes hacerlo desde tu panel.

@component('mail::button', ['url' => url('/home')])
Renovar ahora
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
