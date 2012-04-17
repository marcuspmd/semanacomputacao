<?PHP
require_once (dirname(__FILE__) . '/../controller/usuario.controller.php');

$controller = new usuarioController();

if (empty($action))
	$action = 'listagem';

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

	case 'grid' :
		$pagination = $_REQUEST['page'];
		$rp = $_REQUEST['rp'];
		$sortname = $_REQUEST['sortname'];
		$sortorder = $_REQUEST['sortorder'];
		$query = $_REQUEST['query'];
		$auxFields = explode('&', $query);
		$where = '';
		foreach ((array)$auxFields as $key) {
			list($chave, $valor) = explode('=', $key);
			if (!empty($valor)) {
				$where .= " and $chave like '%$valor%'";
			}
		}
		if (empty($pagination)) {
			$pagination = 1;
		}

		$ret = $controller -> gridUsuario(&$totalReg, $sortname, $sortorder, $page, $limit, $where);
		$data = array();
		$data['page'] = $pagination;

		$data['rows'] = array();

		foreach ((array) $ret as $key) {
			$data['rows'][] = array('id' => $key['idusuario'], 'cell' => $key);
		}
		$data['total'] = count($ret);
		$data['nreg'] = count($ret);
		echo json_encode($data);
		exit();
		break;

	default :
		$pagina = 'listagem';
		break;
}
// $dados = $usuario -> getStruct();
require_once (dirname(__FILE__) . '/base/cabecalho.php');
require_once (dirname(__FILE__) . '/usuario/' . $pagina . '.php');
?>