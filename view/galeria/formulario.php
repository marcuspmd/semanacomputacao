
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span3">
					<div class="well sidebar-nav">
						<ul class="nav nav-list">
							<li class="nav-header">
								Estatisticas
							</li>
							<li >
								<a href="#">Galeria: TESTE</a>
							</li>
							<li >
								<a href="#">Fotos: 10</a>
							</li>
							<li >
								<a href="#">Videos: 10</a>
							</li>
							<li >
								<a href="#">Visualizações: 10</a>
							</li>
							<li >
								<a href="#">Downloads: 10</a>
							</li>
							<li >
								<a href="#">Criada em: 30/10/2010</a>
							</li>
						</ul>
					</div><!--/.well -->
				</div><!--/span-->
				<div class="span9">
					<div class="well">
						<h1>Galeria de Fotos</h1>
					</div>
					<div class="well">
						<ul id="tabs" class="nav nav-tabs">
							<li class="active">
								<a href="#info" class="active" data-toggle="tab">Informações</a>
							</li>
							<li>
								<a href="#meta" data-toggle="tab">Meta-tags</a>
							</li>
							<li>
								<a href="#list" data-toggle="tab">Listagem de fotos</a>
							</li>
							<li>
								<a href="#send" data-toggle="tab">Envio de fotos</a>
							</li>
							<li>
								<a href="#video" data-toggle="tab">Enviar video</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="info">
								<div class="row-fluid">
									<div class="span6">
										Titulo:
										<br />
										<input class="input" type="text" name="galeriaFotos__titulo" id="galeriaFotos__titulo" placeholder="Digite o titulo da galeria" required autofocus />
									</div><!--/span-->
								</div>
								<div class="row-fluid">
									<div class="span3">
										Data:
										<br />
										<input class="input" type="text" name="galeriaFotos__data" id="galeriaFotos__data" placeholder="Digite a data do evento" />
									</div><!--/span-->
									<div class="span3">
										Cidade:
										<br />
										<input class="input" type="text" name="galeriaFotos__cidade" id="galeriaFotos__cidade" placeholder="Digite a cidade do evento" />
									</div><!--/span-->
									<div class="span3">
										Local:
										<br />
										<input class="input" type="text" name="galeriaFotos__local" id="galeriaFotos__local" placeholder="Digite o local do evento"/>
									</div><!--/span-->
								</div>
								<div class="row-fluid">
									<div class="span12">
										Descrição: 										<textarea class="textarea" name="galeriaFotos__descricao" id="galeriaFotos__descricao"  ></textarea>
										</span>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="list">
								...
							</div>
							<div class="tab-pane" id="send">
								<div id="dropbox">
									<span class="message">Arraste e solte o(s) arquivo(s) aqui. </span>
								</div>
							</div>
							<div class="tab-pane" id="video">
								<div class="well" style="background: #666;">
									<div class="row-fluid">
										<input type="text" class="span5" id="video__add" placeholder="ex: http://www.youtube.com/watch?v=9c6W4CCU9M4" />
										<div class="span3" id="video__thumb"></div>
										<button id="button__video" class="btn  pull-right">
											<i class="icon-plus"></i> Adicionar Video
										</button>
										<br clear="all" />
									</div>
								</div>
								<div id="videosAdicionados">
									<div class="row-fluid"></div>
								</div>
							</div>
								<div class="tab-pane" id="meta">
								<div class="row-fluid">
									<div class="span12">
										Meta descrição:
										<br />
										<input class="input" type="text" name="meta__descricao" id="meta__descricao" placeholder="Digite as metas descrições" />
									</div><!--/span-->
									
								</div>
								<div class="row-fluid">
									<div class="span12">
										Meta palavras-chaves:
										<br />
										<input class="input" type="text" name="meta__palavras" id="meta__palavras" placeholder="Digite as palavras chaves do evento"/>
									</div><!--/span-->
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="btn-group pull-right">
					<button class="btn">
						Cancelar
					</button>
					<button class="btn btn-success">
						<i class="icon-ok-sign icon-white"></i> Salvar
					</button>
				</div>
			</div><!--/span-->
		</div><!--/row-->
		<footer>
			<p></p>
		</footer>
		</div><!--/.fluid-container-->
		<script src="/js/jquery-1.7.2.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script charset="UTF-8"src="/js/upload/jquery.filedrop.js"></script>
		<script charset="UTF-8"src="/js/upload/script.js"></script>
		<script charset="UTF-8" src="/js/nicEdit.js"></script>
		<script>
		var videoAdd = 0;
			$(function() {
				$('#tabs').tab('show');
				$('#tabs > li:eq(0)').addClass('active')
				$('#button__video').click(function() {
					addVideo();
				});
				$('#video__add').blur(function() {
					loadVideo();
				});
				
			})
			function loadVideo() {
				url = $('#video__add').val();
				if(url != '')
					$('#video__thumb').html('<iframe src ="utils/youtube.php?url=' + url + '" scrolling="no" frameborder="0" width="200" height="140"></iframe>');
			}

			function addVideo() {
				url = $('#video__add').val();
				if(url != ''){
					if (videoAdd <= 3){
					videoAdd++;
					}else{
					videoAdd=1;
					$('#videosAdicionados').append('<div class="row-fluid"></div>');
					}
					var video = '<div class="span3 videos"><div class="close">&times;</div>'+
											'<input type="hidden" name="video[][video__url]" value="'+url+'" />'+
											'<div class="frame"><iframe  src ="utils/youtube.php?url=' + url + '" scrolling="no" frameborder="0" width="200" height="140"></iframe></div>'+
										'</div>';
					$('#videosAdicionados > .row-fluid:last').append(video);
					$('.close').unbind('click');
					$('.close').click(function() {
						$(this).parent().find(".frame").html('<div class="alert alert-error"><i class="icon-remove"></i> <strong>Video removido</strong></div>');
						$(this).parent().find("input").remove();
						$(this).parent().find(".close").remove();
					});
				}
			}
		</script>
		<script type="text/javascript">
			//<![CDATA[
			bkLib.onDomLoaded(function() {
				new nicEditor({
					buttonList : ['fontSize', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'html', 'image', 'outdent', 'indent', 'left', 'center', 'right', 'justify', 'forecolor']
				}).panelInstance('galeriaFotos__descricao');
			});
			//]]>
		</script>
	</body>
</html>
