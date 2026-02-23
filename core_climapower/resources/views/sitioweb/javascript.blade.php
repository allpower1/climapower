<script src="{{ url('vendor/plugins/js/plugins.min.js') }}"></script>
<script src="{{ url('js/theme.js') }}"></script>
<script src="{{ url('js/views/view.contact.js') }}"></script>
<script src="{{ url('js/custom.js') }}"></script>
<script src="{{ url('js/theme.init.js') }}"></script>
<script>
    var baseurl = "{!! url('/') !!}/";
    var urlpagina1 = "{!! Request::segment(1) !!}";
</script>
@yield('javascript')
