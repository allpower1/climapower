<meta charset="utf-8" />
<title>{{ config('app.name', 'Laravel') }}</title>
<meta content="{{ trans('global.global_title') }}" name="description" />
<meta content="{{ trans('global.global_title') }}" name="author" />
<link rel="icon" type="image/x-icon" href="{{ url('files/images/favicon.ico') }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta property="og:locale" content="es_CL" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ trans('global.global_title') }}" />
<meta property="og:url" content="{{ url('/') }}" />
<meta property="og:site_name" content="{{ trans('global.global_title') }}" />
<link rel="canonical" href="{{ url('/') }}" />
<link rel="shortcut icon" href="{{ url('files/images/favicon.ico') }}" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
<link href="{{ url('plantilla_metronic/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('plantilla_metronic/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('plantilla_metronic/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('plantilla_metronic/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--
<link href="{{ url('extras/plantillav2/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<link href="{{ url('extras/plantillav2/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('extras/plantillav2/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('extras/plantillav2/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('extras/plantillav2/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('extras/plantillav2/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
{!! Html::style('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons') !!}
{!! Html::style('extras/css/app.css') !!}
<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="{{ url('extras/plantillav2/assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('extras/plantillav2/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('extras/plantillav2/assets/libs/@chenfengyuan/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('extras/css/toastr.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ url('extras/css/bootstrap-select.min.css') }}">
<link href="{{ url('extras/css/inputmask.min.css') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ url('extras/css/jquery-confirm.min.css') }}">
-->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<style type="text/css">
    .fondoceancheckboxgarantias {
        color: #00aadd !important;
    }
    .fondoselectzonasucursals {
        background-color:#0d00d0;
        color:white;
    }
    .rojo_stock_productos {
      background-color: #fda7a7 !important;
    }
    .amarillo_stock_maximo_productos {
      background-color: #C3F093 !important;
    }
    .fondocasoabierto {
        background-color: black !important;
    }
    .fondocean {
        background-color: #00aadd !important;
    }
    .fondorojo {
        background-color: red !important;
    }
    .fondoverde {
        background-color: green !important;
    }
    .fondoamarillo {
        background-color: #d8d816 !important;
    }
    .colortextoblanco {
        color: white !important;
    }
    .resaltarojonegrita {
        color: black;
        font-weight: bold;
    }
    .resaltarfilaseleccionada {
        background-color: #a19eff;
    }
    .resaltarfilaencerofacturacion {
        background-color: #F97765;
    }
    .centrar-elemento-verticalmente {
        margin: 0;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }
    .buttons-excel {
        border-color: #358a06 !important;
        background-color: #358a06 !important;
    }
</style>
<style type="text/css">
    @media print{
        .oculto-impresion, .oculto-impresion *{
            display: none !important;
        }

        .mostrar-impresion, .mostrar-impresion *{
            display: block;
        }

        @page { margin: 0; }
    }

    .fondo_agregar_productos {
        background: #e7eaff;
    }

    .margen_agregar_productos {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .classrecalcarhome{
        background-color: #0d00d0;
    }

    .fondomoduloseleccionado{
        background-color: #00aadd;
        opacity:0.8;
    }

    .textoblanco{
        color:white !important
    }

    .colortextototalneto{
        color: black;
        font-weight: bold;
        font-size: 30px;
    }

    .colorbtnrecalcular{
        color: #fff;
        background-color:#00aadd;
        border-color:#00aadd;
    }
</style>
<!-- inicio estilos para nodos pasos entregas -->
<style>
    :root{
        --body-background-color:#e5f4ff ;
        --v-progress-left: 50px;
        --v-progress-item-height-width: 12px;
        --v-progress-line-height: 35px;
        --v-progress-line-width: 3px;
        --v-progress-gap: 13px;
        --blue: #0081C9;
        --green: #159895;
        --light-blue: #5BC0F8;
    }

    /* vertical progress */
    .v-progress{
        padding:10px 0 10px 0;
    }

    .v-progress ul{
        list-style: none;
    }

    .v-progress-item {
        position: relative;
        margin-left: var(--v-progress-left);
        height: var(--v-progress-item-height-width);
        line-height: var(--v-progress-item-height-width);
        margin-bottom: var(--v-progress-line-height);
        --v-progress-border: 8px;
    }

    .v-progress-item:last-child {
        margin-bottom: 0px;
    }

    .v-progress-item:last-child:after {
        border-left: 0px;
    }

    .v-progress-item:before {
        content: "";
        display: inline-block;
        position: absolute;
        width: var(--v-progress-item-height-width);
        height: var(--v-progress-item-height-width);
        left: calc(0px - var(--v-progress-left));
        border-radius: 50%;
        background-color: #ccc;
    }

    .v-progress-item:after {
        content: "";
        display: inline-block;
        position: absolute;
        height: calc(var(--v-progress-line-height) - var(--v-progress-gap));
        top: calc(var(--v-progress-item-height-width) + var(--v-progress-gap) / 2);
        left: calc(0px - var(--v-progress-left) + var(--v-progress-item-height-width) / 2 - var(--v-progress-line-width) / 2);
        border-left: var(--v-progress-line-width) solid #ccc;
    }

    .v-progress-item.completed:after {
        border-color: var(--light-blue);
    }

    .v-progress-item.completed:before {
        content: "✔";
        font-size: 11px;
        text-align: center;
        color: white;
        background: var(--light-blue);
        height: calc(var(--v-progress-border) + var(--v-progress-item-height-width));
        width: calc(var(--v-progress-border) + var(--v-progress-item-height-width));
        line-height: calc(var(--v-progress-border) + var(--v-progress-item-height-width));
        left: calc(0px - var(--v-progress-left) - var(--v-progress-border) / 2);
        top: calc(0px - var(--v-progress-border) + var(--v-progress-border) / 2);
    }

    .v-progress-item.incompleted:after {
        border-color: red;
    }

    .v-progress-item.incompleted:before {
        content: "✔";
        font-size: 11px;
        text-align: center;
        color: white;
        background: red;
        height: calc(var(--v-progress-border) + var(--v-progress-item-height-width));
        width: calc(var(--v-progress-border) + var(--v-progress-item-height-width));
        line-height: calc(var(--v-progress-border) + var(--v-progress-item-height-width));
        left: calc(0px - var(--v-progress-left) - var(--v-progress-border) / 2);
        top: calc(0px - var(--v-progress-border) + var(--v-progress-border) / 2);
    }

    .v-progress-item.inprogress:before {
        background-color: white;
        outline: calc(var(--v-progress-border) / 2) solid var(--blue);
        top: calc(0px - var(--v-progress-border) + var(--v-progress-border));
    }
</style>
<!-- fin estilos para nodos pasos entregas -->
<script src="{{ url('extras/plantillav2/assets/libs/jquery/jquery.min.js') }}"></script>
<link rel="stylesheet" href="{{ url('extras/css/summernote.css') }}">
