/**
 * @author Marcus Paulo M Dias
 */

function mensagemOk(texto,opt){
	jAlert(texto, 'Mensagem');
	return true;
	if (opt != true){
		opt = false;
	}
	jQuery.flashMessenger(texto, {
					waitOk   : opt,
           			clsName  : 'ok',
           			fadeIn   : 0,
           		});
}


$(function() {

	$('input').keypress(function(e) {
		if (e.which == 13){
			var index = $('input').index(this);
			index += 1;
			$('input:eq(' + index + ')').focus();
			
				return false;
			}
	});
	
	$('#unidadeNegocioSelect').change(function(){
		
		var base = $('#unidadeNegocioSelect > option:selected').html();
		var div = '<div class="overflow"><div class="loading">Entrando em <br /> '+ base+'</div></div>';
		$('body').append(div);
		var valor = $('#unidadeNegocioSelect').val();
		setTimeout('delayer('+valor+')', 100);
	})
	
});

function delayer(valor){
    window.location = "/un/"+valor+"/";
   }
   
function loading(mensage, link){
		var div = '<div class="overflow"><div class="loading">'+mensage+'</div></div>';
		$('body').append(div);
		setTimeout('reload(\''+link+'\')', 100);
}

function reload(link){
	if ((link != undefined)&&(link != 'undefined')){
		window.location = link;
	}
}

function stopLoading(interval){
	if (interval == 'undefined')
	interval = 1;
	setTimeout('$(\'.overflow\').remove()',interval);
}

function numberTransform(num){
	num = num.replace('.', '');
	num = num.replace(',', '.');
	num = num * 1;
	return num;
	
}

function dateCompare(data1,data2, alerta){
	var data;
	data = $(data1).val();
	data = data.split('/');
	dataE = Date.parse(data[1]+'/'+data[0]+'/'+data[2]);
	data = $(data2).val();
	data = data.split('/');
	dataP = Date.parse(data[1]+'/'+data[0]+'/'+data[2]);
	if (dataE > dataP){
		jAlert(alerta,'Atenção');
		$(data2).val('');
		$(data2).focus();
		return false;
	}
		return true;
}

function openModalSis(w, h, link) {
        if (w == undefined)
                w = 600;
        if (h == undefined)
                h = 400;
                
        var contents = '<div id="loading"></div>';
        modalWindow.windowId = "modal";
        modalWindow.width = w;
        modalWindow.height = h;
        modalWindow.content = contents;
        modalWindow.open();
        getContents(link);
};

function closeModalSis() {
		modalWindow.close();
	}

function printEl(id){
	
	$(id).printElement({printMode:'popup'});


}

function getContents(link){
        jQuery.ajax({
                type : 'POST',
                url : link,
                async : true,
                success : function(response, s) {
                        $('#loading').remove();
                        $('#modal').html(response);
                }
        })
}


function cpfValidator(value){
	var numeros, digitos, soma, i, resultado, digitos_iguais;
    value = value.replace('.',''); 
    value = value.replace('.',''); 
    value = value.replace('.',''); 
    value = value.replace('-',''); 
    value = value.replace('/','');  
    if (value.length < 3){
	     return false;
	    }
	cpf = value;
    digitos_iguais = 1;
    
    if (cpf.length > 11) {
        return true;
    }

    for (i = 0; i < cpf.length - 1; i++) {
        if (cpf.charAt(i) != cpf.charAt(i + 1)) {
            digitos_iguais = 0;
            break;
        }
    }

    if (!digitos_iguais) {
        numeros = cpf.substring(0,9);
        digitos = cpf.substring(9);
        soma = 0;
        for (i = 10; i > 1; i--) {
            soma += numeros.charAt(10 - i) * i;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)) {
            return false;
        }
        numeros = cpf.substring(0,10);
        soma = 0;
        for (i = 11; i > 1; i--) {
            soma += numeros.charAt(11 - i) * i;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1)) {
            return false;
        }
        return true;
    } else {
        return false;
    }
    return true;
}

function cnpjValidator(value){
		value = value.replace('.',''); 
	    value = value.replace('.',''); 
	    value = value.replace('.',''); 
	    value = value.replace('-',''); 
	    value = value.replace('/','');
	    if (value.length < 3){
		     return false;
		    }
	    if (value.length < 12){
	     return true;
	    }
	    var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
	    cnpj = value;
	      digitos_iguais = 1;
	      if (cnpj.length < 14 && cnpj.length < 15)
	            return false;
	      for (i = 0; i < cnpj.length - 1; i++)
	            if (cnpj.charAt(i) != cnpj.charAt(i + 1))
	                  {
	                  digitos_iguais = 0;
	                  break;
	                  }
	      if (!digitos_iguais)
	            {
	            tamanho = cnpj.length - 2;
	            numeros = cnpj.substring(0,tamanho);
	            digitos = cnpj.substring(tamanho);
	            soma = 0;
	            pos = tamanho - 7;
	            for (i = tamanho; i >= 1; i--)
	                  {
	                  soma += numeros.charAt(tamanho - i) * pos--;
	                  if (pos < 2)
	                        pos = 9;
	                  }
	            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	            if (resultado != digitos.charAt(0))
	                  return false;
	            tamanho = tamanho + 1;
	            numeros = cnpj.substring(0,tamanho);
	            soma = 0;
	            pos = tamanho - 7;
	            for (i = tamanho; i >= 1; i--)
	                  {
	                  soma += numeros.charAt(tamanho - i) * pos--;
	                  if (pos < 2)
	                        pos = 9;
	                  }
	            resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	            if (resultado != digitos.charAt(1))
	                  return false;
	            return true;
	            }
	      else
	            return false;
}
// 
// setInterval(function () {
	// var on = navigator.onLine ? 'online' : 'offline';
  // $('#status').attr('class',on);
  // $('#status').html(on);  
// }, 1000);
// 
// setInterval(function () {
	// window.location = location; 
// }, 1000);
