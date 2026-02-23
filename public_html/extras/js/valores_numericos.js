function solo_numeros(e){
	var tecla = (document.all) ? event.keyCode : e.which;
	if(tecla==8)
		return true;

	var patron =/^[0-9]+$/;
	var te = String.fromCharCode(tecla);

	if(!patron.test(te) && tecla==0){
		return true;
	}

    return patron.test(te);
}

function checkValorNumerico(input){
	var valor = document.getElementById(input).value;
	var options = {style: 'currency', currency: 'clp', minimumFractionDigits: 0, maximumFractionDigits: 0};
	var formatter = new Intl.NumberFormat(options);
	invertido = formatter.format(valor);

	document.getElementById(input).value = invertido;
}

function limpiaPuntoGuion(input){
	var valCheck;
	var obj;
	obj = document.getElementById(input).value;
	obj = obj.replace("NaN","");
	obj = obj.replace(/\./g,"");
	obj = obj.replace(/\,/g,"");
	obj = obj.replace(/\-/g,"");
	document.getElementById(input).value = obj;
}

function checkValorNumericoClass(clase){
	var valor = $("."+clase).val();
	var options = {style: 'currency', currency: 'clp', minimumFractionDigits: 0, maximumFractionDigits: 0};
	var formatter = new Intl.NumberFormat(options);
	invertido = formatter.format(valor);
	$("."+clase).val(invertido);
}

function limpiaPuntoGuionClass(clase){
	var obj;
	obj = $("."+clase).val();
	obj = obj.replace("NaN","");
	obj = obj.replace(/\./g,"");
	obj = obj.replace(/\,/g,"");
	obj = obj.replace(/\-/g,"");
	$("."+clase).val(obj);
}
