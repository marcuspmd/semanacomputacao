<?PHP
require_once (dirname(__FILE__) . '/../controller/edicao.controller.php');

$controller = new edicaoController();

if (empty($action))
	$action = 'formulario';

switch ($action) {
	case 'formulario' :
		switch ($url[2]) {
			case 'salvar' :
				$controller -> savePost($_POST);
				break;
			case is_numeric($url[2]) :
				$controller -> select($url[2]);
				$dados = $controller -> getStruct();
				break;
			default :
				break;
		}
		$pagina = 'formulario';
		break;

	default :
		break;
}
// $dados = $usuario -> getStruct();
require_once (dirname(__FILE__) . '/base/cabecalho.php');
require_once (dirname(__FILE__) . '/edicao/'.$pagina.'.php');
?>