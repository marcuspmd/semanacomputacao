<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">
			<div class="well sidebar-nav">
				<ul class="nav nav-list">
					<li class="nav-header">
						Informações
					</li>
					<li >
						<a href="#">Evento: XYZ</a>
					</li>
					<li >
						<a href="#">Local: XYZ</a>
					</li>
					<li >
						<a href="#">Data: XYZ</a>
					</li>
					<li >
						<a href="#">Vagas: 10/70</a>
					</li>
					<li >
						<a href="#">Criada em: 30/10/2010</a>
					</li>
				</ul>
			</div><!--/.well -->
		</div><!--/span-->
		<div class="span9">
			<div class="well">
				<h1>Eventos</h1>
			</div>
			<form method="post" action="/evento/formulario/salvar/" >
				<div class="well">
					<ul id="tabs" class="nav nav-tabs">
						<li class="active">
							<a href="#info" class="active" data-toggle="tab">Informações</a>
						</li>
						<li>
							<a href="#pre" data-toggle="tab">Adicional</a>
						</li>
						<li>
							<a href="#local" data-toggle="tab">Local</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="info">
							<div class="row-fluid">
								<div class="span6">
									Titulo:
									<br />
									<input  type="hidden" name="evento__idevento" id="evento__idevento" value="<?PHP echo $dados['idevento'] ?>" />
									<input class="input" type="text" name="evento__titulo" id="evento__titulo"  value="<?PHP echo $dados['titulo'] ?>"  placeholder="Digite o titulo do evento" required autofocus />
								</div><!--/span-->
								<div class="span3">
									Curso:
									<br />
									<select name="evento__curso_idcurso" id="evento__curso_idcurso" class="span2">
										<option value="">Escolha uma opção</option>
										<?PHP echo $selectCurso; ?>
									</select>
									</span>
								</div>
								<div class="span3">
									Edição:
									<br />
									<select name="evento__edicao_idedicao" id="evento__edicao_idedicao" class="span2">
										<option value="">Escolha uma opção</option>
										<?PHP echo $selectEdicao; ?>
									</select>
									</span>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span12">
									Resumo:
									<br />
									<textarea class="textarea" name="evento__resumo" id="evento__resumo" > <?PHP echo $dados['resumo'] ?> </textarea>
									</span>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="pre">
							<div class="row-fluid">
								<div class="span3">
									Duração:
									<br />
									<input class="input" type="text" name="evento__duracao" id="evento__duracao" value="<?PHP echo $dados['duracao'] ?>" placeholder="00:00:00" required  />
									</span>
								</div>
								<div class="span3">
									Vagas Disponiveis:
									<br />
									<input class="input" type="text" name="evento__vagasDisponiveis" id="evento__vagasDisponiveis" value="<?PHP echo $dados['vagasDisponiveis'] ?>" placeholder="99" required  />
									</span>
								</div>
								<div class="span3">
									Tipo do evento:
									<br />
									<select name="evento__tipo" id="evento__tipo" class="span2">
										<option value="">Escolha uma opção</option>
										<option value="m" <?PHP if ($dados['tipo'] == 'm') echo 'selected="selected"'; ?> >Minicurso</option>
										<option value="p" <?PHP if ($dados['tipo'] == 'p') echo 'selected="selected"'; ?>>Palestra</option>
									</select>
									</span>
								</div>
								<div class="span3">
									Palestrante:
									<br />
									<select name="evento__usuario_palestrante" id="evento__usuario_palestrante" class="span2">
										<option value="">Escolha uma opção</option>
										<?PHP echo $selectUsuario; ?>
									</select>
									</span>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span12">
									Pre-Requisitos:
									<br />
									<textarea class="textarea" name="evento__preRequisito" id="evento__preRequisito" ><?PHP echo $dados['preRequisito'] ?></textarea>
									</span>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="local">
							<div class="row-fluid">
								<div class="span6">
									Cidade:
									<br />
									<input type="hidden" name="endereco__idendereco" id="endereco__idendereco" value="<?PHP echo $end['idendereco'] ?>"  />
									<input class="input" type="text" name="endereco__cidade" id="endereco__cidade" value="<?PHP echo $end['cidade'] ?>" placeholder="Digite a cidade" />
								</div><!--/span-->
								<div class="span6">
									Bairro:
									<br />
									<input class="input" type="text" name="endereco__bairro" id="endereco__bairro" value="<?PHP echo $end['bairro'] ?>" placeholder="Digite o bairro"/>
								</div><!--/span-->
							</div>
							<div class="row-fluid">
								<div class="span6">
									Rua:
									<br />
									<input class="input" type="text" name="endereco__rua" id="endereco__rua" value="<?PHP echo $end['rua'] ?>"  placeholder="Digite a rua" />
								</div><!--/span-->
								<div class="span3">
									Numero:
									<br />
									<input class="input" type="text" name="endereco__numero" id="endereco__numero" value="<?PHP echo $end['numero'] ?>"  placeholder="Digite o numero" />
								</div><!--/span-->
								<div class="span3">
									Complemento:
									<br />
									<input class="input" type="text" name="endereco__complemento" id="endereco__complemento" value="<?PHP echo $end['complemento'] ?>" placeholder="Digite o complemento" />
								</div><!--/span-->
							</div>
						</div>
					</div>
				</div>
				<div class="btn-group pull-right">
					<button class="btn">
						Cancelar
					</button>
					<button class="btn">
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

<script charset="UTF-8"src="/js/nicEdit.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		area1 = new nicEditor({
			buttonList : ['fontSize', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'html', 'image', 'outdent', 'indent', 'left', 'center', 'right', 'justify', 'forecolor']
		}).panelInstance('evento__preRequisito');
		new nicEditor({
			buttonList : ['fontSize', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'html', 'image', 'outdent', 'indent', 'left', 'center', 'right', 'justify', 'forecolor']
		}).panelInstance('evento__resumo');
		$('a[data-toggle="tab"]').on('shown', function(e) {
			area1.removeInstance('evento__preRequisito');
			area1 = new nicEditor({
				buttonList : ['fontSize', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'html', 'image', 'outdent', 'indent', 'left', 'center', 'right', 'justify', 'forecolor']
			}).panelInstance('evento__preRequisito');
		})
	});

</script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html> 