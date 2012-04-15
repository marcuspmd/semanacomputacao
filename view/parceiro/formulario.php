<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">
			<div class="well sidebar-nav">
				<ul class="nav nav-list">
					<li class="nav-header">
						Informações
					</li>
					<li >
						<a href="#">Parceiro: XYZ</a>
					</li>
					<li >
						<a href="#">Site: XYZ</a>
					</li>
					<li >
						<a href="#">Telefone: XYZ</a>
					</li>
					<li >
						<a href="#">Ativo: Sim</a>
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
				<h1>Parceiro</h1>
			</div>
			<div class="well">
				<ul id="tabs" class="nav nav-tabs">
					<li class="active">
						<a href="#info" class="active" data-toggle="tab">Parceiro</a>
					</li>
					<li>
						<a href="#meta" data-toggle="tab">Detalhes e meta-tags</a>
					</li>
					<li>
						<a href="#logo" data-toggle="tab">Logomarca</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="info">
						<div class="row-fluid">
							<div class="span9">
								Nome:
								<br />
								<input class="input" type="text" name="parceiro__nome" id="parceiro__nome" placeholder="Digite o nome do parceiro" required autofocus />
							</div><!--/span-->
							<div class="span3 pull-right" >
								Ativo:
								<div class="btn-group" data-toggle="buttons-radio">
									<button name="parceiro__ativo" value="1" class="btn active">
										Sim
									</button>
									<button name="parceiro__ativo" value="0" class="btn ">
										Não
									</button>
								</div>
							</div><!--/span-->
						</div>
						<div class="row-fluid">
							<div class="span12">
								Descrição:
								<br />
								<textarea class="textarea" name="parceiro__descricao" id="parceiro__descricao" ></textarea>
								</span>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="meta">
						<div class="row-fluid">
							<div class="span4">
								Site:
								<br />
								<div class="input-prepend">
<span class="add-on" style="margin: -9px -5px 0px 0px;">http://</span>
<input type="text" style="width: 70%;" name="parceiro__site" placeholder="Digite o site: ex www.teste.com.br"  id="parceiro__site" class="span2" type="text" size="16">
</div>
<!-- 								<input class="input" type="text" name="parceiro__site" id="parceiro__site" placeholder="Digite o site: ex www.teste.com.br" /> -->
							</div><!--/span-->
							<div class="span6">
								Endereco:
								<br />
								<input class="input" type="text" name="parceiro__endereco" id="parceiro__endereco" placeholder="Digite o endereço do parceiro" />
							</div><!--/span-->
							<div class="span2">
								Telefone:
								<br />
								<input class="input" type="text" name="parceiro__tel" id="parceiro__tel" placeholder="Digite o telefone" />
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
					<div class="tab-pane" id="logo">
						<div class="row-fluid">
							<div class="span12">
								<div class="span6">
									<input type="file" />
								</div>
								<ul class="thumbnails pull-right">
									<li class="span3">
										<div class="thumbnail">
											<img src="http://placehold.it/260x180" alt="">
										</div>
									</li>
								</ul>
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
		<p>
			&nbsp;
		</p>
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
			buttonList : ['fontSize', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'html', 'image', 'outdent', 'indent', 'left', 'center', 'right', 'justify', 'forecolor']
		}).panelInstance('parceiro__descricao');
	});
	//]]>
</script>
</body>
</html> 