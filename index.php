<?php
$t = microtime(true);
  
if (!empty($_REQUEST['rewrite'])){
$url = explode('/',$_REQUEST['rewrite']);
@$page = $url[0];
@$action = $url[1];
}
require_once (dirname ( __FILE__ ) . '/configs.php');

//if ($_SERVER['REMOTE_ADDR'] != '127.0.0.1'){
//  die('Sistema em ManutenÃ§Ã£o');
//}


if (empty ( $page ))
	$page = 'galeria';



include_once ('view/' . $page . '.php');

  $tmp = microtime(true) - $t;
  $render = 'Renderizado em :'.number_format($tmp,4);
?>