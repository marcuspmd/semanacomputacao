<?php
//database config

if (($_SERVER['SERVER_NAME'] == 'localhost') || ($_SERVER['SERVER_NAME'] == '127.0.0.1') || ($_SERVER['SERVER_NAME'] == '192.168.1.130')) {
	// if (($_SERVER['SERVER_NAME'] == 'localhost') || ($_SERVER['SERVER_NAME'] == '127.0.0.1')){
	@define(_HOST_, 'localhost');
	@define(_LOGIN_, 'root');
	@define(_PASSWORD_, '');
	@define(_SCHEMA_, 'fabrica');
	@define(_CHARSET_, 'utf8');
	@define(_DIRETORIO_, '');
	// @define(_LOG_, array('BD','log'));
	@define(_LOG_, serialize(array('FILE',dirname(__FILE__).'/log/','marcus')));

} else {
	@define(_HOST_, 'localhost');
	@define(_LOGIN_, 'fiber_erpa');
	@define(_SCHEMA_, 'fiber_erp');
	@define(_CHARSET_, 'utf8');
}

// configuracoes do sistema
@define(_HASH_SYSTEM_, 'fiber');
@define(_SYSTEM_NAME_, 'Fiber');
// @define (_BASE_,dirname(__FILE__));
@define(_TEMPLATE_ADMIN_, dirname(__FILE__) . '/controllerSmarty/');

@define(_SITE_LOCATION_, 'http://www.fiber.ind.br/revendedor/login.php?msg=Sessão%20expirada%20ou%20usuario%20entrou%20em%20outro%20local');
@define(_SITE_LOCATION_LOGON_, 'index.php');
@define(_IMAGE_LOADER_, 'http://www.fiber.ind.br/solinter/utils/loadImage.php?');
@define(_SESSION_PATH_, '/home/fiber1/tmp/sess_');

@define(_LINK_, 'http://' . $_SERVER['HTTP_HOST'] . '/');
@define(_JS_, _LINK_ . 'js/');
@define(_CSS_, _LINK_ . 'css/');
// @define (_JS_,'http://localhost/js/');
// @define (_CSS_,'http://localhost/css/');

// upload
@define(_UPLOAD_TEMP_, dirname(__FILE__) . '/uploads');
@define(_UPLOAD_FAIL_, 'Falha ao fazer upload');
@define(_UPLOAD_FORMAT_FAIL_, 'Formato invalido');
@define(_UPLOAD_FORMAT_IMAGEM_, serialize(array('jpg', 'jpeg', 'gif', 'tidd', 'bmp', 'psd', 'png')));
@define(_UPLOAD_FORMAT_FILE_, serialize(array('jpg', 'jpeg', 'gif', 'tidd', 'bmp', 'psd', 'png', 'pdf', 'doc', 'docx', 'txt', 'odt')));

// database
@define(_DBASE_, _BASE_ . '/class/DBase.class.php');
@define(ERROR_NOT_CONNECTED, 'Não foi possivel estabilizar uma conexão com o banco de dados.');
@define(ERROR_NOT_FOUND, 'Banco de dados não encontrado.');
@define(EMPTY_VALUE, 'Nenhum dados foi enviado.');
@define(OK, 'OK.');

//tabelas
//empresa - cliente
@define(_TABLE_USUARIO_, 'usuario');
@define(_TABLE_REFERENCIA_, 'referencia');
@define(_TABLE_ENDERECO_, 'endereco');
@define(_TABLE_DIVISAO_, 'divisao');
@define(_TABLE_CONTATO_EMPRESA_, 'contato_empresa');
@define(_TABLE_COMPARTILHAMENTO_EMPRESA_, 'compartilhamento_empresa');
// financeiro
@define(_TABLE_LANCAMENTO_, 'lancamento');
@define(_TABLE_PORTADOR_, 'portador');
@define(_TABLE_CONTAS_FINANCEIRA_, 'contas_financeira');
@define(_TABLE_TIPO_PAGTO_, 'tipo_pagto');
@define(_TABLE_ESPDOC_, 'espDoc');
@define(_TABLE_LANC_RECUSADO_, 'lanc_recusado');
//usuario
@define(_TABLE_USUARIO_, 'usuario');
@define(_TABLE_UNIDADE_NEGOCIO_, 'unidade_negocio');
@define(_TABLE_UNIDADE_NEGOCIO_HAS_USUARIO_, 'unidade_negocio_has_usuario');
@define(_TABLE_PERMISSAO_, 'permissao');
@define(_TABLE_ACESSO_, 'acesso');
@define(_TABLE_AREA_, 'area');
@define(_TABLE_SIMPLES_, 'simples');
@define(_TABLE_ROTINA_, 'rotina');
@define(_TABLE_MODULO_, 'modulo');

@define(_TABLE_ARQUIVO_, 'arquivo');
@define(_TABLE_ARQUIVO_HAS_LANCAMENTO_, 'arquivo_has_lancamento');

//erros

@define(_FAIL_SAVE_PHOTO_, 'Erro ao salvar a foto no banco de dados');
@define(_LOGIN_OR_PASSWORD_FAIL_, 'Login ou Senha Invalido');
@define(_PASSWORD_REPASSWORD_FAIL_, 'Senha e contra-senha não conferem');
@define(_CREATE_ACCOUNT_FAIL_, 'Erro ao criar sua conta');
@define(_EMAIL_INVALID_, 'Email inexistente');
@define(_UPDATE_ACCOUNT_FAIL_, 'Erro ao alterar dados da conta');
?>