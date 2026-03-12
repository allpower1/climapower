<!-- seccion footer -->
<footer id="footer">
    <div class="container my-4">
        <div class="row py-5">
            <div class="col-md-5 col-lg-3 mb-5 mb-lg-0">
                <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-4">EMPRESA</h5>
                <p class="mb-1"><a href="{{ url('site_climapower') }}" class="text-4 link-hover-style-1">CLIMAPOWER</a></p>
                <p class="mb-1"><a href="{{ url('site_grupochr') }}" class="text-4 link-hover-style-1">GRUPOCHR</a></p>
                <p class="mb-1"><a href="{{ url('directorio') }}" class="text-4 link-hover-style-1">Directorio</a></p>
                <p class="mb-1"><a href="{{ url('datos_comerciales') }}" class="text-4 link-hover-style-1">Datos Comerciales</a></p>
                <p class="mb-1"><a href="{{ url('servicios') }}" class="text-4 link-hover-style-1">Servicios</a></p>
                <p class="mb-1"><a href="{{ url('productos') }}" class="text-4 link-hover-style-1">Productos</a></p>
                <p class="mb-1"><a href="{{ url('contratos') }}" class="text-4 link-hover-style-1">Contratos</a></p>
                <p class="mb-1"><a href="{{ url('eficiencia_energetica') }}" class="text-4 link-hover-style-1">Eficiencia Energética</a></p>
                <p class="mb-1"><a href="{{ url('unidades_negocios') }}" class="text-4 link-hover-style-1">Unidades de Negocios</a></p>
                <p class="mb-1"><a href="{{ url('contacto') }}" class="text-4 link-hover-style-1">Contacto</a></p>
            </div>
            <div class="col-md-7 col-lg-5 mb-5 mb-lg-0">
                <div class="row">
                    <div class="col-6">
                        <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-4">IMPORTANTE</h5>
                        <p class="mb-1"><a href="{{ url('informacion_general') }}" class="text-4 link-hover-style-1">Informacón General</a></p>
                        <p class="mb-1"><a href="{{ url('terminosycondiciones') }}" class="text-4 link-hover-style-1">Términos & Condiciones</a></p>
                        <p class="mb-1"><a href="{{ url('politicas_calidad') }}" class="text-4 link-hover-style-1">Politicas de Calidad</a></p>
                        <p class="mb-1"><a href="{{ url('politicas_cookies') }}" class="text-4 link-hover-style-1">Politicas de Cookies</a></p>
                        <p class="mb-1"><a href="{{ url('formas_pagos') }}" class="text-4 link-hover-style-1">Formas de Pago</a></p>
                        <p class="mb-1"><a href="{{ url('comunidades') }}" class="text-4 link-hover-style-1">Comunidades</a></p>
                        <p class="mb-1"><a href="{{ url('despachos') }}" class="text-4 link-hover-style-1">Despachos</a></p>
                        <p class="mb-1"><a href="{{ url('excluye') }}" class="text-4 link-hover-style-1">Excluye</a></p>
                        <p class="mb-1"><a href="{{ url('garantias') }}" class="text-4 link-hover-style-1">Garantías</a></p>
                        <p class="mb-1"><a href="{{ url('aviso_legal') }}" class="text-4 link-hover-style-1">Aviso Legal</a></p>
                    </div>
                    <div class="col-6">
                        <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-4">LINK</h5>
                        <p class="mb-1"><a href="https://shop.climapower.cl/" class="text-4 link-hover-style-1">Tienda Electrónica</a></p>
                        <p class="mb-1"><a href="{{ url('preguntas_frecuentes') }}" class="text-4 link-hover-style-1">Preguntas Frecuentes</a></p>
                        <p class="mb-1"><a href="{{ url('descargas_pdf') }}" class="text-4 link-hover-style-1">Descargas (PDF)</a></p>
                        <p class="mb-1"><a href="{{ url('normativas') }}" class="text-4 link-hover-style-1">Normativas</a></p>
                        <p class="mb-1"><a href="{{ url('partners') }}" class="text-4 link-hover-style-1">Partners</a></p>
                        <p class="mb-1"><a href="{{ url('soporte') }}" class="text-4 link-hover-style-1">Soporte</a></p>
                        <p class="mb-1"><a href="{{ url('contacto') }}" class="text-4 link-hover-style-1">Reclamos</a></p>
                        <p class="mb-1"><a href="{{ url('oferta_trabajo') }}" class="text-4 link-hover-style-1">Oferta de Trabajo</a></p>
                        <p class="mb-1"><a href="{{ url('trabaja_con_nosotros') }}" class="text-4 link-hover-style-1">Trabaja con Nosotros</a></p>
                        <p class="mb-1"><a href="https://grupochr.cl/" class="text-4 link-hover-style-1">Grupochr.cl</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-4">NEWSLETTER</h5>
                <p class="text-4 mb-1">Recibe toda la información más reciente sobre ofertas y promociones.</p>
                <p class="text-4">Suscríbete hoy mismo a nuestro boletín informativo.</p>
                <form action="{{ url('enviar_newsletter') }}" method="POST" class="mw-100">
                    @csrf

					@include('partials.alerts')

                    <div class="input-group input-group-rounded">
                        <input class="form-control form-control-sm bg-light px-4 text-3" placeholder="Email..." name="email" id="email" type="email">
                        <button class="btn btn-primary text-color-light text-2 py-3 px-4" type="submit"><strong>SUSCRIBIRSE!</strong></button>
                    </div>
					<div class="row">
                        <div class="form-group col-8">
                            <br>
                            <x-captcha-container />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-copyright footer-copyright-style-2">
        <div class="container py-2">
            <div class="row py-4">
                <div class="col-md-12 col-lg-8 mb-5 mb-lg-0">
                    <p>©{{ date('Y') }} | <span class="text-color-light">CLIMAPOWER®</span>  Todos los derechos reservados | Desarrollado por <a href="https://allpower.cl/" target="_blank">ALLPOWER®</a></p>
                </div>
                <div class="col-lg-4">
                    <a href="https://grupochr.cl/" target="_blank"><p style="text-align: right;">by GRUPOCHR®.</p></a>
                </div>
            </div>
        </div>
    </div>
</footer>