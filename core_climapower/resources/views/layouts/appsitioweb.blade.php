<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths">
    <head>
        @include('sitioweb.head')
        <meta name="description" content="Somos la única Plataforma Web Publicitaria para reunir específicamente áreas y rubros especiales, segmentados por regiones y detalles individuales a nivel nacional.">
        <meta name="keywords" content="Masajes, Masajistas, Sensitivo, Erótico, SPA-Hombres, Masaje-Sensitivo, Masaje-Erotico, Masaje-Relajación, Masaje-Tantrico, masajes relajantes, masajes terapéuticos, masajes descontracturantes, masajes a domicilio, masajistas profesionales, bienestar corporal, alivio del estrés, técnicas de relajación, salud y bienestar, masajes personalizados, atención privada de masajes, masajes en Santiago, servicios de relajación, masajes con aceites esenciales, masajes para el estrés, masajes antiestrés, masajes musculares, masajes para la espalda, masajes para el cuello, masajes para piernas cansadas, masajistas en Santiago, masajes en Providencia, masajes en Las Condes, masajes a domicilio en Santiago, masajes privados en Chile, servicios de masajes en casa">
        <meta name="author" content="CLIMAPOWER">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{ url()->current() }}" />
        <meta property="og:title" content="CLIMAPOWER">
        <meta property="og:description" content="Somos la única Plataforma Web Publicitaria para reunir específicamente áreas y rubros especiales, segmentados por regiones y detalles individuales a nivel nacional.">
        <meta property="og:image" content="{{ url('img/logoclimapower.png') }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "LocalBusiness",
                "name": "TuLadoVIP",
                "image": "{{ url('img/logoclimapower.png') }}",
                "url": "{{ url()->current() }}",
                "telephone": "+569 79705919",
                "address": {
                    "@type": "PostalAddress",
                    "addressLocality": "Santiago",
                    "addressCountry": "CL"
                },
                "description": "Somos la única Plataforma Web Publicitaria para reunir específicamente áreas y rubros especiales, segmentados por regiones y detalles individuales a nivel nacional.",
                "priceRange": "$$"
            }
        </script>
    </head>
    <body>
		<div class="body">
            @include('sitioweb.header')
			<div role="main" class="main">
                @yield('content')
			</div>
            @include('sitioweb.footer')
		</div>
        @include('sitioweb.javascript')
	</body>
</html>