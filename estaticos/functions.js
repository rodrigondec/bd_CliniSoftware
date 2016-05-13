function log_out(base){
	swal({
  		title: "Deseja mesmo sair?",
  		text: "",
  		type: "warning",
  		showCancelButton: true,
  		cancelButtonClass: "btn-primary",
  		cancelButtonText: "Cancelar",
  		confirmButtonClass: "btn-danger",
  		confirmButtonText: "sair!",
  		closeOnConfirm: false
	},
	function(){
	  window.location = '/'+base+'logout.php';
	});
}

function sa(head, body, tipo, loc, btn){	
	if(loc == ''){
		swal({
			title: head,
			text: body,
			type: tipo,
			closeOnConfirm: false,
			confirmButtonClass: btn,
			html: false
		});
	}
	else{
		swal({
			title: head,
			text: body,
			type: tipo,
			closeOnConfirm: false,
			confirmButtonClass: btn,
			html: false
		}, 
		function(){
			window.location = loc;
		});
	}
}

function validar_cnpj() {
 	
	var cnpj = $('#cnpj').val()

    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == ''){
    	return false;
    } 
    
    try {
	    if (cnpj.length != 14){
	        throw "CNPJ inválido";
	    }

        tamanho = cnpj.length - 2
	    numeros = cnpj.substring(0,tamanho);
	    digitos = cnpj.substring(tamanho);
	    soma = 0;
	    pos = tamanho - 7;
	    for (i = tamanho; i >= 1; i--) {
			soma += numeros.charAt(tamanho - i) * pos--;
			if (pos < 2){
				pos = 9;
			}
	    }
	    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	    if (resultado != digitos.charAt(0)){
	        throw "CNPJ inválido";
	    }
	         
	    tamanho = tamanho + 1;
	    numeros = cnpj.substring(0,tamanho);
	    soma = 0;
	    pos = tamanho - 7;
	    for (i = tamanho; i >= 1; i--) {
			soma += numeros.charAt(tamanho - i) * pos--;
			if (pos < 2){
				pos = 9;
			}
	    }
	    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	    if (resultado != digitos.charAt(1)){
	    	throw "CNPJ inválido";
	    }	     

	    $('#group_cnpj').removeClass('has-error')
		$('#group_cnpj').addClass('has-success')

		$('#icon_cnpj').removeClass('fa-minus')
		$('#icon_cnpj').removeClass('fa-times')
		$('#icon_cnpj').addClass('fa-check')

	    return true;
	}
	catch(err){
		$('#group_cnpj').removeClass('has-success')
		$('#group_cnpj').addClass('has-error')

		$('#icon_cnpj').removeClass('fa-minus')
		$('#icon_cnpj').removeClass('fa-check')
		$('#icon_cnpj').addClass('fa-times')

		return false;
	}
}