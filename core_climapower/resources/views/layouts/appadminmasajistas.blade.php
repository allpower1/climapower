<!DOCTYPE html>
<html lang="en-US" class="js scheme_creative_light" style="--fixed-rows-height: 0px">
<head>
    @include('sitioweb.head')
    @yield('cssadicionales')
</head>
<body>
    <div class="body_wrap">
        <div class="page_wrap">
            @include('sitioweb.header')
            @yield('content')
            @include('sitioweb.footer')
        </div>
    </div>
    @include('sitioweb.javascript')
</body>
</html>