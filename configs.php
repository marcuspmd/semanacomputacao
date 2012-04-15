<?php
//database config

if (($_SERVER['SERVER_NAME'] == 'localhost') || ($_SERVER['SERVER_NAME'] == '127.0.0.1') || ($_SERVER['SERVER_NAME'] == '192.168.1.130')) {
	// if (($_SERVER['SERVER_NAME'] == 'localhost') || ($_SERVER['SERVER_NAME'] == '127.0.0.1')){
	@define(_HOST_, 'localhost');
	@define(_LOGIN_, 'root');
	@define(_PASSWORD_, '');
	@define(_SCHEMA_, 'fabrica');
	@define(_CHARSET_, 'utf8');
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

//tabelas
@define(_TABLE_CURSO_, 'curso');
@define(_TABLE_EDICAO_, 'edicao');
@define(_TABLE_EVENTO_, 'evento');
@define(_TABLE_USUARIO_, 'usuario');
@define(_TABLE_ENDERECO_, 'endereco');
?>