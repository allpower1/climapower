$(document).ready(function(){

  $('select#regions').on('change',function(){
    var get_valor = $(this).val();

    if(get_valor == ""){
      var valor = 0;
    }else{
      var valor = get_valor;
    }

    $.get(baseurl+"get-provincias-regiones/"+valor, function(response1, id) {
      $("#provinces").empty()
      $("#provinces").append("<option value='' selected>[Seleccione]</option>")

      if (response1 == "") {
        $('.provinces').select('refresh')
      }else{
        for(i = 0; i <response1.length; i++) {
          $("#provinces").append("<option value='"+response1[i].id+"'>"+response1[i].nombre+"</option>")
          $('.provinces').select('refresh')
        }
        $('#provinces').val(id)
        $('.provinces').select('refresh')
      }
    });
  });

  $('select#provinces').on('change',function(){
    var get_valor = $(this).val();

    if(get_valor == ""){
      var valor = 0;
    }else{
      var valor = get_valor;
    }

    $.get(baseurl+"get-comunas-provincias/"+valor, function(response1, id) {
      $("#communes").empty()
      $("#communes").append("<option value='' selected>[Seleccione]</option>")

      if (response1 == "") {
        $('.communes').select('refresh')
      }else{
        for(i = 0; i <response1.length; i++) {
          $("#communes").append("<option value='"+response1[i].id+"'>"+response1[i].nombre+"</option>")
          $('.communes').select('refresh')
        }
        $('#communes').val(id)
        $('.communes').select('refresh')
      }
    });
  });

  //para contacto de emergencia 1
  $('select#regions1').on('change',function(){
    var get_valor = $(this).val();

    if(get_valor == ""){
      var valor = 0;
    }else{
      var valor = get_valor;
    }

    $.get(baseurl+"get-provincias-regiones/"+valor, function(response1, id) {
      $("#provinces1").empty()
      $("#provinces1").append("<option value='' selected>[Seleccione]</option>")

      if (response1 == "") {
        $('.provinces1').select('refresh')
      }else{
        for(i = 0; i <response1.length; i++) {
          $("#provinces1").append("<option value='"+response1[i].id+"'>"+response1[i].nombre+"</option>")
          $('.provinces1').select('refresh')
        }
        $('#provinces1').val(id)
        $('.provinces1').select('refresh')
      }
    });
  });

  $('select#provinces1').on('change',function(){
    var get_valor = $(this).val();

    if(get_valor == ""){
      var valor = 0;
    }else{
      var valor = get_valor;
    }

    $.get(baseurl+"get-comunas-provincias/"+valor, function(response1, id) {
      $("#communes1").empty()
      $("#communes1").append("<option value='' selected>[Seleccione]</option>")

      if (response1 == "") {
        $('.communes1').select('refresh')
      }else{
        for(i = 0; i <response1.length; i++) {
          $("#communes1").append("<option value='"+response1[i].id+"'>"+response1[i].nombre+"</option>")
          $('.communes1').select('refresh')
        }
        $('#communes1').val(id)
        $('.communes1').select('refresh')
      }
    });
  });

  //para contacto de emergencia 2
  $('select#regions2').on('change',function(){
    var get_valor = $(this).val();

    if(get_valor == ""){
      var valor = 0;
    }else{
      var valor = get_valor;
    }

    $.get(baseurl+"get-provincias-regiones/"+valor, function(response1, id) {
      $("#provinces2").empty()
      $("#provinces2").append("<option value='' selected>[Seleccione]</option>")

      if (response1 == "") {
        $('.provinces2').select('refresh')
      }else{
        for(i = 0; i <response1.length; i++) {
          $("#provinces2").append("<option value='"+response1[i].id+"'>"+response1[i].nombre+"</option>")
          $('.provinces2').select('refresh')
        }
        $('#provinces2').val(id)
        $('.provinces2').select('refresh')
      }
    });
  });

  $('select#provinces2').on('change',function(){
    var get_valor = $(this).val();

    if(get_valor == ""){
      var valor = 0;
    }else{
      var valor = get_valor;
    }

    $.get(baseurl+"get-comunas-provincias/"+valor, function(response1, id) {
      $("#communes2").empty()
      $("#communes2").append("<option value='' selected>[Seleccione]</option>")

      if (response1 == "") {
        $('.communes2').select('refresh')
      }else{
        for(i = 0; i <response1.length; i++) {
          $("#communes2").append("<option value='"+response1[i].id+"'>"+response1[i].nombre+"</option>")
          $('.communes2').select('refresh')
        }
        $('#communes2').val(id)
        $('.communes2').select('refresh')
      }
    });
  });

});