@extends('layouts.applayoutwebpaycreate')

@section('content')
<h1> Transacción creada. </h1>
<p class="-mt-4 mb-4">Ahora, con los datos recibidos se debe redirigir al usuario a webpay a la url indicada y con el token recibidos</p>

<div style="display: none;">
    <div class="request">
        <h3 class="font-bold">Request:</h3>
        <pre>{{ print_r($params, true) }}</pre>
    </div>

    <div class="response">
        <h3 class="font-bold">Respuesta:</h3>
        <pre>{{ print_r($response, true)  }}</pre>
    </div>
</div>

<form id="formcreatetransaccionwebpay" method="get" action={{  $response->getUrl() }}>
    <input name="token_ws" value="{{ $response->getToken() }}" readonly/>
    <button type="submit" class="theme-btn">Enviar datos</button>
</form>
<script>
    document.getElementById("formcreatetransaccionwebpay").submit();
</script>
@endsection
