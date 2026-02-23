<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{{ config('app.name', 'Laravel') }}</title>
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ url('files/images/favicon.ico') }}">
<link rel="apple-touch-icon" href="{{ url('files/images/favicon.ico') }}">
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Web Fonts  -->
<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700%7CSintony:400,700&display=swap" rel="stylesheet" type="text/css">
<!-- Vendor CSS -->
<link rel="stylesheet" href="{{ url('vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('vendor/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ url('vendor/animate/animate.compat.css') }}">
<link rel="stylesheet" href="{{ url('vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
<link rel="stylesheet" href="{{ url('vendor/owl.carousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ url('vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ url('vendor/magnific-popup/magnific-popup.min.css') }}">
<!-- Theme CSS -->
<link rel="stylesheet" href="{{ url('css/theme.css') }}">
<link rel="stylesheet" href="{{ url('css/theme-elements.css') }}">
<link rel="stylesheet" href="{{ url('css/theme-blog.css') }}">
<link rel="stylesheet" href="{{ url('css/theme-shop.css') }}">
<!-- Demo CSS -->
<link rel="stylesheet" href="{{ url('css/demos/demo-business-consulting.css') }}">
<!-- Skin CSS -->
<link id="skinCSS" rel="stylesheet" href="{{ url('css/skins/skin-business-consulting.css') }}">
<!-- Theme Custom CSS -->
<link rel="stylesheet" href="{{ url('css/custom.css') }}">

@yield('cssadicionales')
