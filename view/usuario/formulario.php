<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">
			<div class="well sidebar-nav">
				<ul class="nav nav-list">
					<li class="nav-header">
						Informações
					</li>
					<li >
						<a href="#">Nome: XYZ</a>
					</li>
					<li >
						<a href="#">Email: XYZ</a>
					</li>
					<li >
						<a href="#">Cpf/cnpj: XYZ</a>
					</li>
					<li >
						<a href="#">Data Nasc.: XYZ</a>
					</li>
					<li >
						<a href="#">Matricula: 10/70</a>
					</li>
					<li >
						<a href="#">Telefone: 10/70</a>
					</li>
					<li >
						<a href="#">Criada em: 30/10/2010</a>
					</li>
				</ul>
			</div><!--/.well -->
		</div><!--/span-->
		<div class="span9">
			<div class="well">
				<h1>Usuario</h1>
			</div>
			<form method="post" action="/usuario/formulario/salvar/" >
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
									<label class="form-inline">
										<input class="form-inline" type="radio" name="cpfCnpj" id="cpfCnpj" value="0" checked="checked" />
										Pessoa Fisica</label>
								</div>
								<div class="span6">
									<label class="form-inline">
										<input type="radio" name="cpfCnpj" id="cpfCnpj" value="1" />
										Pessoa Juridica</label>
								</div>
								<br /> &nbsp;
							</div>
							<div class="row-fluid">
								<div class="span6">
									Nome:
									<br />
									<input  type="hidden" name="usuario__idusuario" id="usuario__idusuario" value="<?PHP echo $dados['idusuario'] ?>" />
									<input class="input" type="text" name="usuario__nome" id="usuario__nome"  value="<?PHP echo $dados['nome'] ?>"  placeholder="Digite o nome" required autofocus />
								</div><!--/span-->
								<div class="span3">
									<span id="cpforCnpj">Cpf</span> :
									<br />
									<input class="input" type="text" name="usuario__cpfCnpj" id="usuario__cpfCnpj"  value="<?PHP echo $dados['cpfCnpj'] ?>"   required />
									</span>
								</div>
								<div class="span3">
									Senha:
									<br />
									<input class="input" type="password" name="usuario__senha" id="usuario__senha"  value="<?PHP echo $dados['senha'] ?>" />
									</span>
								</div>
								
							</div>
							<div class="row-fluid">
								<div class="span6">
									Email:
									<br />
									<input class="input" type="email" name="usuario__email" id="usuario__email"  value="<?PHP echo $dados['email'] ?>"  placeholder="exemplo@exemplo.com" required />
									</span>
								</div>
								<div class="span3">
									Data Nascimento:
									<br />
									<input class="input" type="text" name="usuario__nascimento" id="usuario__nascimento"  value="<?PHP echo $dados['nascimento'] ?>"  placeholder="39/19/9999" required />
									</span>
								</div>
								<div class="span3">
									Matricula:
									<br />
									<input class="input" type="text" name="usuario__matricula" id="usuario__matricula"  value="<?PHP echo $dados['matricula'] ?>"  placeholder="99999999" />
									</span>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span3">
									Telefone:
									<br />
									<input class="input" type="text" name="usuario__telefone" id="usuario__telefone"  value="<?PHP echo $dados['telefone'] ?>"  placeholder="(99) 9999-99999" />
									</span>
								</div>
								<div class="span3">
									Celular:
									<br />
									<input class="input" type="text" name="usuario__celular" id="usuario__celular"  value="<?PHP echo $dados['celular'] ?>"  placeholder="(99) 9999-99999" />
									</span>
								</div>
								
									<div class="span6">
									Tipo de usuario:
									<br />
									<select name="usuario__tipoCadastro" id="usuario__tipoCadastro" class="span3">
										<option value="">Escolha uma opção</option>
										<option value="A" <?PHP if ($dados['tipoCadastro'] == 'A') echo 'selected="selected"'; ?> >Aluno</option>
										<option value="P" <?PHP if ($dados['tipoCadastro'] == 'P') echo 'selected="selected"'; ?>>Palestrante</option>
										<option value="C" <?PHP if ($dados['tipoCadastro'] == 'C') echo 'selected="selected"'; ?>>Colaboradores</option>
										<option value="D" <?PHP if ($dados['tipoCadastro'] == 'D') echo 'selected="selected"'; ?>>Desenvolvimento</option>
										<option value="T" <?PHP if ($dados['tipoCadastro'] == 'T') echo 'selected="selected"'; ?>>Professor</option>
									</select>
									</span>
								</div>
							</div>
							<div class="row-fluid">
								<div class="row-fluid">
								<div class="span12">
									Curriculo:
									<br />
									<textarea class="textarea" name="usuario__curriculo" id="usuario__curriculo" ><?PHP echo $dados['curriculo'] ?></textarea>
									</span>
								</div>
							</div>
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
<script src="/js/jquery-1.7.2.min.js"></script>
<script charset="UTF-8"src="/js/nicEdit.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		new nicEditor({
			buttonList : ['fontSize', 'bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'html', 'image', 'outdent', 'indent', 'left', 'center', 'right', 'justify', 'forecolor']
		}).panelInstance('usuario__curriculo');
	});

</script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html> 