<?php
$t = microtime(true);
  
if (!empty($_REQUEST['rewrite'])){
$url = explode('/',$_REQUEST['rewrite']);
@$page = $url[0];
@$action = $url[1];
}


require_once (dirname ( __FILE__ ) . '/configs.php');
session_start();

$usuario = array('cd_usuario'=>'1', 'nivel'=>6);
$_SESSION['usuario'] =  serialize($usuario);


if (empty($_SESSION['contaCorrente'])){
	$_SESSION['contaCorrente'] = array('portador' => 0, 'pz' => 0);
}

if (empty($_SESSION['unidadeSelected'])){
	$_SESSION['unidadeSelected'] = serialize(array('unidade' => 1, 
								'franquia' => 0, 
								'funcionario' => 0,
								'licenciada' => 1,
								'empresa' => 1
								 ));
}

if (strtolower($page) == 'un'){
	$sessao = unserialize($_SESSION['unidadeSelected']);
	$sessao['unidade'] =  $action;
	$_SESSION['unidadeSelected'] = serialize($sessao['unidade']);
	 header("location: ".$_SERVER['PHP_SELF']);
}
if (strtolower($page) == 'pt'){
	$sessao = unserialize($_SESSION['contaCorrente']);
	$sessao['portador'] =  $action;
	$_SESSION['contaCorrente'] = serialize($sessao);
	 header("location: "._LINK_.'financeiro/contaCorrente/');
}
if (strtolower($page) == 'pz'){
	$sessao = unserialize($_SESSION['contaCorrente']);
	$sessao['pz'] =  $action;
	$_SESSION['contaCorrente'] = serialize($sessao);
	 header("location: "._LINK_.'financeiro/contaCorrente/');
}


//if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1'){
//  die('Sistema em ManutenÃ§Ã£o');
//}




if (empty ( $page ))
	$page = 'cliente';



include_once ('view/' . $page . '.php');

  $tmp = microtime(true) - $t;
  $render = 'Renderizado em :'.number_format($tmp,4);
?>