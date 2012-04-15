<?PHP

if (empty($action))
	$action = '';
	
	
switch ($action) {
	case 'salvar' :
		// $usuario -> savePost($_POST);
		break;

	default :
		
		break;
}
// $dados = $usuario -> getStruct();
require_once (dirname(__FILE__) . '/base/cabecalho.php');
require_once (dirname(__FILE__) . '/noticia/formulario.php');
?>