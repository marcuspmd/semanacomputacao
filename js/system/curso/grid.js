$(function() {

	var h = $('html').height();
	if(h > 400) {
		h = h;
	} else {
		h = 280;
	}

	$("#grid").flexigrid({
		url : '/curso/grid/',
		dataType : 'json',
		colModel : [
					{display : 'Codigo', name : 'idcurso',	width : 45,	sortable : true, align : 'left', search : true}, 
					{display : 'Abreviação', name : 'abreviacao',width : 100,sortable : true,	align : 'left',	search : true}, 
					{display : 'Descrição',name : 'descricao',width : 730,sortable : true,align : 'left',search : true} 
					],
		buttons : [
			// {name : 'Novo',	bclass : 'novo',onpress : doCommand}, 
			// {separator : true}, 
			{name : 'Novo', bclass : 'icon-file',onpress : doCommand	}, 
			// {name : 'Exibir CR', bclass : 'open',onpress : doCommand	}, 
			{name : 'Editar',displayInicial : 'hidden',	bclass : 'icon-pencil',onpress : doCommand	},
			// {name : 'Imprimir',displayInicial : 'hidden',	bclass : 'icon-print',onpress : doCommand	},
			],
		sortname : "descricao",
		sortorder : "desc",
		usepager : false,
		useRp : true,
		rp : 1000,
		height : 300,
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
				$('[rel="Editar"]').css('display', 'block');
			} else {
				$('[rel="Editar"]').css('display', 'none');
				// $('[rel="Editar"]').css('display', 'none');
			}
			if($('#grid .trSelected').length >= 1) {
				// $('[rel="Imprimir"]').css('display', 'block');
				// $('[rel="Excluir"]').css('display', 'block');
			} else {
				// $('[rel="Imprimir"]').css('display', 'none');
				// $('[rel="Excluir"]').css('display', 'none');
			}
			
}


function doCommand(com, grid) {
	switch (com) {
		case 'Novo':
			loading('Carregando...', '/curso/formulario/');
			break;
		case 'Editar':
			var id = '';
			$('.trSelected', grid).each(function() {
				id = $(this).attr('id');
				id = id.substring(id.lastIndexOf('row') + 3);
			});
			loading('Carregando...', '/curso/formulario/' + id + '/');
			break;
		default:
			alert($('.trSelected', grid).length);
			break;
	}
}
