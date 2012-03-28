<section id="control">
	<section id="formulario">
		<h1 class="tituloForms">Cadastro de clientes</h1>
		<form id="form" method="post" action="<?php echo _LINK_ ?>usuario/formulario/salvar/" >
				<section id="tabs-empresa">
					<input type="hidden" id="usuario_idusuario" name="usuario_idusuario"  value="<?PHP echo $dadosEmpresa['id_usuario'];?>" />
					<p>
						<label class="coluns2" for="cpf ou cnpj"><span class="cpfCnpj">Cpf/cnpj</span>:
							<br />
							<input type="text" value="<?PHP echo $dadosEmpresa['cpfCnpj'];?>"  style="width: 30%;"  id="empresa__cpfCnpj" name="empresa__cpfCnpj" placeholder="000.000.000-00" required autofocus/>
						</label>
						<label class="coluns2" for="Nome">Nome:
							<br />
							<input type="text" value="<?PHP echo $dadosEmpresa['nome'];?>"  id="empresa__nome" name="empresa__nome" placeholder="digite o nome" required />
						</label>
						
					</p>
					<p>
						<label class="coluns3 noFisica" for="Nome fantasia">Nome fantasia:
							<br />
							<input type="text" value="<?PHP echo $dadosEmpresa['fantasia'];?>" id="empresa__fantasia" name="empresa__fantasia"   />
						</label>
						<label class="coluns3 noFisica" for="Inscrição Estadual">Inscrição estadual:
							<br />
							<input type="text" value="<?PHP echo $dadosEmpresa['inscricao_estadual'];?>" id="empresa__inscricao_estadual" name="empresa__inscricao_estadual"   />
						</label>
						<label class="coluns3 noFisica" for="Inscrição Municipal">Inscrição municipal:
							<br />
							<input type="text" value="<?PHP echo $dadosEmpresa['inscricao_municipal'];?>" id="empresa__inscricao_municipal" name="empresa__inscricao_municipal"   />
						</label>
					</p>
					<p>
						<label class="coluns5" for="Limite de credito">Limite credito:
							<br />
							<input type="text" value="<?PHP echo $dadosEmpresa['limite_credito'];?>"  id="empresa__limite_credito" name="empresa__limite_credito"  alt="signed-decimal" placeholder="0.00" required/>
						</label>
						<label class="coluns5" for="Limite mensal">Limite mensal:
							<br />
							<input type="text" value="<?PHP echo $dadosEmpresa['limite_mensal'];?>"  id="empresa__limite_mensal" name="empresa__limite_mensal"  alt="signed-decimal" placeholder="0.00" required/>
						</label>
					</p>
					<p>
						<label class="coluns4" for="Desconto ">Desconto 1:
							<br />
							<input type="text" class="inv" value="<?PHP echo $dadosEmpresa['desconto1'];?>" style="width: 50%;" id="empresa__desconto1" name="empresa__desconto1" value="" />
							% </label>
						<label class="coluns4" for="Desconto 2">Desconto 2:
							<br />
							<input type="text" class="inv" value="<?PHP echo $dadosEmpresa['desconto2'];?>" style="width: 50%;" id="empresa__desconto2" name="empresa__desconto2" value="" />
							% </label>
						<label class="coluns4" for="Desconto 3">Desconto 3:
							<br />
							<input type="text" class="inv" value="<?PHP echo $dadosEmpresa['desconto3'];?>" style="width: 50%;" id="empresa__desconto3" name="empresa__desconto3" value="" />
							% </label>
						<label class="coluns4" for="Desconto 4">Desconto 4:
							<br />
							<input type="text" class="inv" value="<?PHP echo $dadosEmpresa['desconto4'];?>" style="width: 50%;" id="empresa__desconto4" name="empresa__desconto4" value="" />
							% </label>
					</p>
					<p>
						<label class="coluns1" for="Observação">Observação:
							<br />
							<textarea name="empresa__obs" id="empresa__obs"><?PHP echo $dadosEmpresa['obs'];?></textarea> </label>
					</p>
					<p>
						<label class="coluns1 inv" for="Empresa ativa">
							<input type="checkbox" class="checkbox" id="empresa__ativo" name="empresa__ativo"
							<?PHP
								if ($dadosEmpresa['ativo'])
									echo 'checked="checked"';
 ?>  value="1"/>
							Cliente ativo </label>
					</p>
				</section>
			<div class="coluns1 inv">
			<input type="submit" class="salvar" value=" SALVAR " />
			</div>
		</form>
	</section>
</section>
