
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span3">
					<div class="well sidebar-nav">
						<ul class="nav nav-list">
							<li class="nav-header">
								Informações
							</li>
							<li >
								<a href="#">Noticia: XYZ</a>
							</li>
							<li >
								<a href="#">Data: XYZ</a>
							</li>
							<li >
								<a href="#">Visualizações: 10</a>
							</li>
							<li >
								<a href="#">Criada em: 30/10/2010</a>
							</li>
						</ul>
					</div><!--/.well -->
				</div><!--/span-->
				<div class="span9">
					<div class="well">
						<h1>Noticia</h1>
					</div>
					<div class="well">
						<ul id="tabs" class="nav nav-tabs">
							<li class="active">
								<a href="#info" class="active" data-toggle="tab">Noticia</a>
							</li>
							<li>
								<a href="#meta" data-toggle="tab">Detalhes e meta-tags</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="info">
								<div class="row-fluid">
									<div class="span6">
										Titulo:
										<br />
										<input class="input" type="text" name="noticia__titulo" id="noticia__titulo" placeholder="Digite o titulo da noticia" required autofocus />
									</div><!--/span-->
								</div>
								<div class="row-fluid">
									<div class="span12">
										Noticia:
										<br />
										<textarea class="textarea" name="noticia__noticia" id="noticia__noticia" ></textarea>
										</span>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="meta">
								<div class="row-fluid">
									<div class="span4">
										Autor:
										<br />
										<input class="input" type="text" name="noticia__autor" id="noticia__autor" placeholder="Digite o nome do autor" />
									</div><!--/span-->
									<div class="span4">
										Fonte:
										<br />
										<input class="input" type="text" name="noticia__fonte" id="noticia__fonte" placeholder="Digite a fonte da noticia" />
									</div><!--/span-->
									<div class="span4">
										Data:
										<br />
										<input class="input" type="text" name="noticia__data" id="noticia__data" placeholder="Digite a data" />
									</div><!--/span-->
									
								</div>
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
				<p>&nbsp;</p>
			</footer>
		</div><!--/.fluid-container-->
		<script src="/js/jquery-1.7.2.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script charset="UTF-8"src="/js/upload/jquery.filedrop.js"></script>
		<script charset="UTF-8"src="/js/upload/script.js"></script>
		<script charset="UTF-8"src="/js/nicEdit.js"></script>
		<script>
			$(function() {
				$('#tabs').tab('show');
				$('#tabs > li:eq(0)').addClass('active')
			})
		</script>
		
		<script type="text/javascript">
			//<![CDATA[
			bkLib.onDomLoaded(function() {
				new nicEditor({
					buttonList : ['fontSize', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'html', 'image','outdent', 'indent','left','center','right','justify','forecolor']
				}).panelInstance('noticia__noticia');
			});
			//]]>
		</script>
	</body>
</html>
