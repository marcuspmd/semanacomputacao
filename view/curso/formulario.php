<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">
			<div class="well sidebar-nav">
				<ul class="nav nav-list">
					<li class="nav-header">
						Informações
					</li>
					<li >
						<a href="#">Curso: XYZ</a>
					</li>
					<li >
						<a href="#">Curso cadastrados: 10</a>
					</li>
					<li >
						<a href="#">Criado em: 30/10/2010</a>
					</li>
				</ul>
			</div><!--/.well -->
		</div><!--/span-->
		<div class="span9">
			<div class="well">
				<h1>Curso</h1>
			</div>
			<form id="form" method="POST" action="/curso/formulario/salvar/" >
			<div class="well">
				<ul id="tabs" class="nav nav-tabs">
					<li class="active">
						<a href="#info" class="active" data-toggle="tab">Informações</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="info">
						<div class="row-fluid">
							<div class="span6">
								Descrição:
								<br />
								<input type="hidden" name="curso__idcurso" id="curso__idcurso" value="<?PHP echo $dados['idcurso'] ?>" />
								<input class="input" type="text" name="curso__descricao" id="curso__descricao" value="<?PHP echo $dados['descricao'] ?>" placeholder="Digite o nome do curso" required autofocus />
							</div><!--/span-->
							<div class="span6">
								Abreviação:
								<br />
								<input class="input" type="text" name="curso__abreviacao" id="curso__abreviacao" value="<?PHP echo $dados['abreviacao'] ?>" placeholder="Digite a abreviacao do curso"  />
							</div><!--/span-->
						</div>
					</div>
				</div>
			</div>
			<div class="btn-group pull-right">
				<button class="btn">
					Cancelar
				</button>
				<button id="formSave" class="btn">
					Salvar
				</button>
			</div>
		
			</form>
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

</body>
</html> 