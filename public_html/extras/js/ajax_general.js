$(document).ready(function() {
    //window.scrollTo(0, 0);
    $("html, body").animate({ scrollTop: 0 }, 600);

    $.fn.dataTable.moment( 'DD-MM-YYYY' );

    $("#tabla_general_datatable_roles").DataTable({
        "order": [[ 1, "asc" ]],
        "language": {
            url: baseurl+"extras/js/Spanish.json"
        },
        "lengthMenu": [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, "Todos"]
        ],
        'iDisplayLength': -1,
    });
    $("#tabla_general_datatable").DataTable({
        "order": [[ 1, "asc" ]],
        "language": {
            url: baseurl+"extras/js/Spanish.json"
        },
        "lengthMenu": [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, "Todos"]
        ],
        'iDisplayLength': 10,
    });
    $("#tabla_general_datatable1").DataTable({
        "language": {
            url: baseurl+"extras/js/Spanish.json"
        },
        "lengthMenu": [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, "Todos"]
        ],
        'iDisplayLength': 10,
    });
    $("#tabla_general_datatable2").DataTable({
        "language": {
            url: baseurl+"extras/js/Spanish.json"
        },
        "lengthMenu": [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, "Todos"]
        ],
        'iDisplayLength': -1,
    });
    $("#tabla_general_datatable3").DataTable({
        "language": {
            url: baseurl+"extras/js/Spanish.json"
        },
        "lengthMenu": [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, "Todos"]
        ],
        'iDisplayLength': -1,
    });
    $("#tabla_general_datatable4").DataTable({
        "language": {
            url: baseurl+"extras/js/Spanish.json"
        },
        "lengthMenu": [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, "Todos"]
        ],
        'iDisplayLength': -1,
    });
    $("#tabla_general_datatable5").DataTable({
        "language": {
            url: baseurl+"extras/js/Spanish.json"
        },
        "lengthMenu": [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, "Todos"]
        ],
        'iDisplayLength': -1,
    });
    $("#tabla_general_datatable6").DataTable({
        "language": {
            url: baseurl+"extras/js/Spanish.json"
        },
        "lengthMenu": [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, "Todos"]
        ],
        'iDisplayLength': -1,
    });
    $("#tabla_general_datatable7").DataTable({
        "language": {
            url: baseurl+"extras/js/Spanish.json"
        },
        "lengthMenu": [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, "Todos"]
        ],
        'iDisplayLength': -1,
    });
    $("#tabla_general_datatable8").DataTable({
        "language": {
            url: baseurl+"extras/js/Spanish.json"
        },
        "lengthMenu": [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, "Todos"]
        ],
        'iDisplayLength': -1,
    });
    $("#tabla_general_datatable9").DataTable({
        "language": {
            url: baseurl+"extras/js/Spanish.json"
        },
        "lengthMenu": [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, "Todos"]
        ],
        'iDisplayLength': -1,
    });
    $("#tabla_general_datatable10").DataTable({
        "language": {
            url: baseurl+"extras/js/Spanish.json"
        },
        "lengthMenu": [
            [10, 25, 50, 100, 500, -1],
            [10, 25, 50, 100, 500, "Todos"]
        ],
        'iDisplayLength': -1,
    });

    function decimalAdjust(type, value, exp) {
        // Si el exp no está definido o es cero...
        if (typeof exp === 'undefined' || +exp === 0) {
            return Math[type](value);
        }
        value = +value;
        exp = +exp;
        // Si el valor no es un número o el exp no es un entero...
        if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
            return NaN;
        }
        // Shift
        value = value.toString().split('e');
        value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
        // Shift back
        value = value.toString().split('e');
        return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
    }

    // Decimal round
    if (!Math.round10) {
        Math.round10 = function(value, exp) {
            return decimalAdjust('round', value, exp);
        };
    }
    // Decimal floor
    if (!Math.floor10) {
        Math.floor10 = function(value, exp) {
            return decimalAdjust('floor', value, exp);
        };
    }
    // Decimal ceil
    if (!Math.ceil10) {
        Math.ceil10 = function(value, exp) {
            return decimalAdjust('ceil', value, exp);
        };
    }

});

function formatearNumeroMiles(numero){
    return new Intl.NumberFormat("es-CL").format(numero);
}

function checkRut(rut)
{
    // Despejar Puntos
    var valor = rut.value.replace('.','');
    // Despejar Guión
    valor = valor.replace('-','');

    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();

    // Formatear RUN
    rut.value = cuerpo + '-'+ dv

    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;

    // Para cada dígito del Cuerpo
    for(i=1;i<=cuerpo.length;i++) {

        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);

        // Sumar al Contador General
        suma = suma + index;

        // Múltiplo dentro del rango [2,7]
        if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
    }

    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);

    // Casos Especiales (0 y K)
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;

    // Validar que el Cuerpo coincide con su Dígito Verificador
    if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
}

function solo_numeros(e)
{
    var regex = new RegExp("^[0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
}

function valida_abecedario_numeros_espacio(e)
{
    var regex = new RegExp("^[a-zA-ZñÑ0-9 ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
}

function valida_abecedario_espacio(e)
{
    var regex = new RegExp("^[a-zA-ZñÑ ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
}

function valida_abecedario_numeros_email(e)
{
    var regex = new RegExp("^[a-zA-Z0-9@._-]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
}

function valida_numeros_rut(e)
{
    var regex = new RegExp("^[0-9kK]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
}

$('#allcheckboxusuarios').change(function() {
    if ($(this).is(':checked')) {
        $('.listcheckboxusuarios').prop('checked','checked');
    }else{
        $('.listcheckboxusuarios').prop('checked','');
    }
    comprobarCheckboxUsuarios();
});

function comprobarCheckboxUsuarios()
{
    buscarquefilaresaltarseguncheck('trfilausuarios','listcheckboxusuarios');
}

$('#allcheckboxroles').change(function() {
    if ($(this).is(':checked')) {
        $('.inputcheckboxroles').prop('checked','checked');
    }else{
        $('.inputcheckboxroles').prop('checked','');
    }
    comprobarCheckboxRoles();
});

function comprobarCheckboxRoles()
{
    buscarquefilaresaltarseguncheck('trfilasroles','inputcheckboxroles');
}

function confirm_eliminar_usuario(idusuario)
{
    var popup = confirm('¿Esta seguro que desea eliminar el usuario seleccionado?');
    if(popup == true){
      window.location.href = baseurl+'admin/users/eliminar_usuario/'+idusuario;
    }
}

function volverpaginaanterior()
{
    window.history.back();
}

//buscar que checkbox resaltar
function buscarquefilaresaltarseguncheck(nombreclasetr,nombreclasecheckbox)
{
    $("."+nombreclasetr).each(function() {
        //buscar el checkbox
        var inputcheckboxencontrado = $(this).find("input."+nombreclasecheckbox)

        if ($(inputcheckboxencontrado).is(':checked')) {
            $(this).addClass("resaltarfilaseleccionada")
        }else{
            $(this).removeClass("resaltarfilaseleccionada")
        }
    });
}
