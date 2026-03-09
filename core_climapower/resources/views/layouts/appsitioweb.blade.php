<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths">
    <head>
        @include('sitioweb.head')
        <meta name="description" content="Climatización-HVAC, Climatización, HVAC, Mantención HVAC, Servicios técnicos, Emergencias 24/7">
        <meta name="keywords" content="Climatización-HVAC, Climatización, HVAC, Mantención HVAC, Servicios técnicos, Emergencias 24/7">
        <meta name="author" content="CLIMAPOWER">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{ url()->current() }}" />
        <meta property="og:title" content="CLIMAPOWER">
        <meta property="og:description" content="Climatización-HVAC, Climatización, HVAC, Mantención HVAC, Servicios técnicos, Emergencias 24/7">
        <meta property="og:image" content="{{ url('img/logoclimapower.png') }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:type" content="website">
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "LocalBusiness",
                "name": "ClimaPower",
                "image": "{{ url('img/logoclimapower.png') }}",
                "url": "{{ url()->current() }}",
                "telephone": "+569 79705919",
                "address": {
                    "@type": "PostalAddress",
                    "addressLocality": "Santiago",
                    "addressCountry": "CL"
                },
                "description": "Climatización-HVAC, Climatización, HVAC, Mantención HVAC, Servicios técnicos, Emergencias 24/7",
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