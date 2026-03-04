<script type="text/javascript">
  var baseurl = "{!! url('/') !!}/";
  var urlpagina1 = "{!! Request::segment(1) !!}";
  var urlpagina2 = "{!! Request::segment(2) !!}";
  var urlpagina3 = "{!! Request::segment(3) !!}";
  var urlpagina4 = "{!! Request::segment(4) !!}";
  var roluser = $("#roluser").val();
</script>
<script>var hostUrl = "{{ url('/') }}";</script>
<script src="{{ url('plantilla_metronic/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ url('plantilla_metronic/js/scripts.bundle.js') }}"></script>
<script src="{{ url('plantilla_metronic/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src="{{ url('plantilla_metronic/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ url('plantilla_metronic/js/custom/apps/customers/list/export.js') }}"></script>
<script src="{{ url('plantilla_metronic/js/custom/apps/customers/list/list.js') }}"></script>
<script src="{{ url('plantilla_metronic/js/custom/apps/customers/add.js') }}"></script>
<script src="{{ url('plantilla_metronic/js/widgets.bundle.js') }}"></script>
<script src="{{ url('plantilla_metronic/js/custom/widgets.js') }}"></script>
<script src="{{ url('plantilla_metronic/js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ url('plantilla_metronic/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ url('plantilla_metronic/js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ url('plantilla_metronic/js/custom/utilities/modals/new-target.js') }}"></script>
<script src="{{ url('plantilla_metronic/js/custom/utilities/modals/users-search.js') }}"></script>

<script src="{{ url('extras/js/bootstrap-notify.js') }}"></script>

<!--
<script src="{{ url('extras/plantillav2/assets/libs/bootstrap/js/bootstrap.bundle.min_web.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
-->
<!-- para usar los botones -->
<!--
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="{{ url('extras/plantillav2/assets/libs/datatables.net-bs4/js/buttons.bootstrap5.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
-->
<!-- para los estilos excel -->
<!--
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.2/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.2/js/buttons.html5.styles.templates.min.js"></script>
<script src="{{ url('extras/plantillav2/assets/js/pages/dashboard.init.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/js/app.js') }}"></script>
-->
<script src="{{ url('extras/plantillav2/assets/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/js/pages/form-advanced.init.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('extras/plantillav2/assets/libs/@chenfengyuan/datepicker/datepicker.min.js') }}"></script>
<script src="{{ url('extras/js/toastr.js') }}"></script>
<script>
  $(function () {
    $('#example1').DataTable( {
      "aLengthMenu": [[10, 25, 50, 100, 500, -1], [10, 25, 50, 100, 500, "All"]],
      "language": {
        url: baseurl+"extras/js/Spanish.json",
        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
      },
    });
    $('#example2').DataTable( {
      "aLengthMenu": [[10, 25, 50, 100, 500, -1], [10, 25, 50, 100, 500, "All"]],
      "language": {
        url: baseurl+"extras/js/Spanish.json",
        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
      },
    });
    $('#example3').DataTable( {
      "aLengthMenu": [[10, 25, 50, 100, 500, -1], [10, 25, 50, 100, 500, "All"]],
      "language": {
        url: baseurl+"extras/js/Spanish.json",
        processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
      },
    });
  })
</script>
<script>
  window._token = '{{ csrf_token() }}';
</script>
<script src="{{ url('extras/js/tableExporter.js') }}"></script>
<script src="{{ url('extras/js/summernote.min.js') }}"></script>
<script src="{{ url('extras/js/text_area_css.js') }}"></script>
<script src="{{ url('extras/js/si_get_regiones_ciudades.js') }}"></script>
<script src="{{ url('extras/js/valores_numericos.js') }}"></script>
<script src="{{ url('extras/js/validador_rut.js') }}"></script>
<script src="{{ url('extras/js/daterangepicker.js') }}"></script>
<script src="{{ url('extras/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ url('extras/js/inputmask.js') }}"></script>
<script src="{{ url('extras/js/jquery.inputmask.bundle.js') }}"></script>
<script src="{{ url('extras/js/jquery-confirm.min.js') }}"></script>
<script src="{{ url('extras/js/moment.min.js') }}"></script>
<script src="{{ url('extras/js/datetime-moment.js') }}"></script>
<script src="{{ url('extras/js/ajax_general.js') }}"></script>
<script src="{{ url('extras/js/listados_ajax.js') }}"></script>
<script>
  $(function () {
    $('#rango_fecha_pedido').daterangepicker();
    $('#rango_fecha_pedido2').daterangepicker();

    $('#datepicker').datepicker({
      autoclose: true,
      useLocalTimezone: false,
    });
  })
</script>
<script>
  ClassicEditor
    .create(document.querySelector('#datatxt'))
    .catch(error => {
      console.error(error);
    });
  ClassicEditor
    .create(document.querySelector('#descripcion'))
    .catch(error => {
      console.error(error);
    });
  ClassicEditor
    .create(document.querySelector('#texto_primera_parte'))
    .catch(error => {
      console.error(error);
    });
  ClassicEditor
    .create(document.querySelector('#texto_segunda_parte'))
    .catch(error => {
      console.error(error);
    });
  ClassicEditor
    .create(document.querySelector('#texto_tercera_parte'))
    .catch(error => {
      console.error(error);
    });
  ClassicEditor
    .create(document.querySelector('#datahtml'))
    .catch(error => {
      console.error(error);
    });
</script>
@yield('javascript')
