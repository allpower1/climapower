
$(document).ready(function(){
  
});

$('select#select_region').on('change',function(){
  var valor = $(this).val();
  $.get(baseurl+"get-ciudades/"+event.target.value, function(response, id) {
      $("#select_ciudad").empty()
      $("#select_ciudad").append("<option value='0' selected>Seleccione...</option>")

      if (response == "") {
        $('.select_ciudad').select('refresh')
      }else{
        for(i = 0; i <response.length; i++) {
          $("#select_ciudad").append("<option value='"+response[i].id+"'>"+response[i].descripcion+"</option>")
          $('.select_ciudad').select('refresh')
        }
        $('#select_ciudad').val(id)
        $('.select_ciudad').select('refresh')
      }
  });
});

$('select#select_region_ce1').on('change',function(){
  var valor = $(this).val();
  $.get(baseurl + "get-ciudades/"+event.target.value, function(response, id) {
      $("#ciudad_emergencia1").empty()
      $("#ciudad_emergencia1").append("<option value='0' selected>Seleccione...</option>")

      if (response == "") {
        $('.ciudad_emergencia1').select('refresh')
      }else{
        for(i = 0; i <response.length; i++) {
          $("#ciudad_emergencia1").append("<option value='"+response[i].id+"'>"+response[i].descripcion+"</option>")
          $('.ciudad_emergencia1').select('refresh')
        }
        $('#ciudad_emergencia1').val(id)
        $('.ciudad_emergencia1').select('refresh')
      }
  });
});

$('select#select_region_ce2').on('change',function(){
  var valor = $(this).val();
  $.get(baseurl+"get-ciudades/"+event.target.value, function(response, id) {
      $("#ciudad_emergencia2").empty()
      $("#ciudad_emergencia2").append("<option value='0' selected>Seleccione...</option>")

      if (response == "") {
        $('.ciudad_emergencia2').select('refresh')
      }else{
        for(i = 0; i <response.length; i++) {
          $("#ciudad_emergencia2").append("<option value='"+response[i].id+"'>"+response[i].descripcion+"</option>")
          $('.ciudad_emergencia2').select('refresh')
        }
        $('#ciudad_emergencia2').val(id)
        $('.ciudad_emergencia2').select('refresh')
      }
  });
});