<?PHP
require_once (dirname(__FILE__) . '/../controller/usuario.controller.php');

$controller = new usuarioController();

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
			$dados = $controller -> getStruct();
			break;
			}
			$pagina =
 'formulario';
		break;

	default :
		break;
}
// $dados = $usuario -> getStruct();
require_once (dirname(__FILE__) . '/base/cabecalho.php');
require_once (dirname(__FILE__) . '/usuario/' . $pagina . '.php');
?>