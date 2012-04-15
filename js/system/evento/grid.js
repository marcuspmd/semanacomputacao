$(function() {

	var h = $('html').height();
	if(h > 400) {
		h = h;
	} else {
		h = 280;
	}

	$("#grid").flexigrid({
		url : '/evento/',
		dataType : 'json',
		colModel : [
					{display : 'Codigo', name : 'idevento',	width : 45,	sortable : true, align : 'left', search : true}, 
					{display : 'Titulo',name : 'titulo',width : 300,sortable : true,align : 'left',search : true}, 
					{display : 'Data', table: 'dataEvento',name : 'nome',width : 80,sortable : true,	align : 'left',	search : true}, 
					{display : 'Palestrante',name : 'nome', table:'usuario', width : 300, sortable : true,align : 'left',	search : true}, 
					{display : 'Duracao',name : 'duracao',	width : 70, sortable : true,align : 'left',	search : true}, 
					{display : 'Vagas',name : 'vagasDisponiveis',	width : 70, sortable : true,align : 'left',	search : false}, 
					],
		buttons : [
			// {name : 'Novo',	bclass : 'novo',onpress : doCommand}, 
			// {separator : true}, 
			{name : 'Novo', bclass : 'icon-file',onpress : doCommand	}, 
			// {name : 'Exibir CR', bclass : 'open',onpress : doCommand	}, 
			{name : 'Visualizar',displayInicial : 'hidden',	bclass : 'icon-list-alt',onpress : doCommand	},
			{name : 'Imprimir',displayInicial : 'hidden',	bclass : 'icon-print',onpress : doCommand	},
			],
		sortname : "dataEvento",
		sortorder : "desc",
		usepager : false,
		useRp : true,
		rp : 1000,
		height : h,
		singleSelect : false,
		onSuccess : dbl,
		resizable : false
	});
	
	
	
});


function dbl() {
	$('#grid > tbody > tr').each(function() {
		$(this).click(function(e) {
			events();			
		})
	})
	events();
}

function events() {
	
			if($('#grid .trSelected').length == 1) {
				// $('[rel="Editar"]').css('display', 'block');
				$('[rel="Visualizar"]').css('display', 'block');
			} else {
				$('[rel="Visualizar"]').css('display', 'none');
				// $('[rel="Editar"]').css('display', 'none');
			}
			if($('#grid .trSelected').length >= 1) {
				$('[rel="Imprimir"]').css('display', 'block');
				// $('[rel="Excluir"]').css('display', 'block');
			} else {
				$('[rel="Imprimir"]').css('display', 'none');
				// $('[rel="Excluir"]').css('display', 'none');
			}
			
			var valor = 0;
			$('#grid .trSelected > td').each(function() {
				if('saldo_lanc' == $(this).attr('abbr')) {
					valor += numberTransform($(this).children().html()) * 1;
				}
			});
			if (valor == undefined){
				valor = 0;
			}
			$('#qtdSelected').html($('#grid .trSelected').length);
			$('#saldoVal').html(number_format(valor, 2, ',', '.'));
}

function remove(list){
	jQuery.ajax({
		type : 'POST',
		url : '/contas_pagar/delete/',
		async : true,
		data : {
			'ids' : list
		},
		success : function(response, s) {
			stopLoading(1000);
			g.doSearch();
		}
	})
}
function consolidar(list){
	jQuery.ajax({
		type : 'POST',
		url : '/financeiro/consolidar/',
		async : true,
		data : {
			'list' : list
		},
		success : function(response, s) {
			loading('Carregando ...', '/financeiro/contaCorrente/');
		}
	})
}
function recusar(id, r){
	jQuery.ajax({
		type : 'POST',
		url : '/contas_receber/recusar/',
		async : true,
		data : {
			'ids' : id,
			'motivo' : r
		},
		success : function(response, s) {
			stopLoading(1000);
			g.doSearch();
		}
	})
}

function doCommand(com, grid) {
	switch (com) {
		case 'Novo':
			loading('Carregando...', '/evento/formulario/');
			break;
		case 'Editar':
			var id = '';
			$('.trSelected', grid).each(function() {
				id = $(this).attr('id');
				id = id.substring(id.lastIndexOf('row') + 3);
			});
			loading('Carregando Conta a pagar', '/contas_pagar/formulario/' + id + '/');
			break;
		case 'Visualizar':
			var id = '';
			$('.trSelected', grid).each(function() {
				id = $(this).attr('id');
				id = id.substring(id.lastIndexOf('row') + 3);
			});
			loading('Carregando Lançamento', '/financeiro/liquidacao/' + id + '/');
			break;
		default:
			alert($('.trSelected', grid).length);
			break;
	}
}
