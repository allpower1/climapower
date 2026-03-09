
@section('javascript')
<script>
    document.getElementById('shareWhatsApp').addEventListener('click', function () {
        let message = encodeURIComponent("¡Oye!, mira esta Web, puedes encontrar a Tu Lado VIP en la región que selecciones… vela, está muy buena, www.ClimaPower.cl");
        window.open("https://wa.me/?text="+message,"_blank");
    });

    document.getElementById('shareFacebook').addEventListener('click', function () {
        let fbUrl = "https://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent(baseurl);
        window.open(fbUrl, "_blank");
    });

    document.getElementById('shareTelegram').addEventListener('click', function () {
        let message = encodeURIComponent("¡Oye!, mira esta Web, puedes encontrar a Tu Lado VIP en la región que selecciones… vela, está muy buena, www.ClimaPower.cl");
        window.open("https://t.me/share/url?url="+baseurl+"&text="+message,"_blank");
    });
</script>
@endsection
