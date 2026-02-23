$(document).ready(function(){
  $.fn.editable.defaults.mode = 'inline';
  $('.opcion_permiso').editable({
      source: [
          {value: 1, text: 'Activo'},
          {value: 0, text: 'Inactivo'}
      ]
  });
});