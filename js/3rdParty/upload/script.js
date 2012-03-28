$(function(){
	
	var dropbox = $('#dropbox'),
		message = $('.message', dropbox);
	
	dropbox.filedrop({
		// The name of the $_FILES entry:
		paramname:'pic',
		
		maxfiles: 20,
    	maxfilesize: 5,
		url: '../../../post_file.php',
		
		uploadFinished:function(i,file,response){
			$.data(file).addClass('done');
			// response is the JSON object that post_file.php returns
		},
		
    	error: function(err, file) {
			switch(err) {
				case 'BrowserNotSupported':
					mensagemOk('Seu navegador não suporta html5');
					break;
				case 'TooManyFiles':
					mensagemOk('Limite maximo de arquivos atingido.');
					break;
				case 'FileTooLarge':
					mensagemOk('Tamanho maximo do arquivo e de 5Mb');
					break;
				default:
					break;
			}
		},
		
		// Called before each upload is started
		beforeEach: function(file){
			// if(!file.type.match(/^image\//)){
				// alert('Only images are allowed!');
				return true;
				
				// Returning false will cause the
				// file to be rejected
				// return false;
			// }
		},
		
		uploadStarted:function(i, file, len){
			createImage(file);
		},
		
		progressUpdated: function(i, file, progress) {
			$.data(file).find('.progress').width(progress);
		}
    	 
	});
	
	var template = '<div class="preview">'+
						'<span class="imageHolder">'+
							'<img />'+
							'<span class="uploaded"></span>'+
						'</span>'+
						'<div class="progressHolder">'+
							'<div class="progress"></div>'+
						'</div>'+
					'</div>'; 
	
	
	function createImage(file){
		

		var preview = $(template), 
			image = $('img', preview);
			
		if(file.type.match(/^image\//)){
				
			
		var reader = new FileReader();
		
		
		reader.onload = function(e){
			
			// e.target.result holds the DataURL which
			// can be used as a source of the image:
			
			image.attr('src',e.target.result);
		};
		
		// Reading the file as a DataURL. When finished,
		// this will trigger the onload function above:
		reader.readAsDataURL(file);
		}else{
			image.attr('src','../../../img/upload/noimg.jpg');
		}
		message.hide();
		preview.appendTo(dropbox);
		
		// Associating a preview container
		// with the file, using jQuery's $.data():
		
		$.data(file,preview);
	}

	function showMessage(msg){
		message.html(msg);
	}

});