<?PHP
require_once (dirname(__FILE__) . '/../controller/evento.controller.php');
require_once (dirname(__FILE__) . '/../controller/endereco.controller.php');
require_once (dirname(__FILE__) . '/../controller/edicao.controller.php');
require_once (dirname(__FILE__) . '/../controller/curso.controller.php');
require_once (dirname(__FILE__) . '/../controller/usuario.controller.php');

$controller = new eventoController();

if (empty($action))
	$action = '';

switch ($action) {
	case 'formulario' :
		$endereco = new enderecoController();
		$edicao = new edicaoController();
		$curso = new cursoController();
		$usuario = new usuarioController();
		$selectEdicao = $edicao -> makeSelectEdicao();
		$selectCurso = $curso -> makeSelectCurso();
		$selectUsuario = $usuario -> makeSelectPalestrante();
		switch ($url[2]) {
			case 'salvar' :
				$entrada = separarArrays($_POST);
				$endereco -> savePost($entrada['endereco']);
				$id_evento = $controller -> savePost($entrada['evento']);
				break;
			case is_numeric($url[2]) :
				$controller -> select($url[2]);
				$dados = $controller -> getStruct();
				$selectEdicao = $edicao -> makeSelectEdicao($dados['edicao_idedicao']);
				$selectCurso = $curso -> makeSelectCurso($dados['curso_idcurso']);
				$selectUsuario = $usuario -> makeSelectPalestrante($dados['usuario_palestrante']);
				$endereco -> select($dados['endereco_idendereco']);
				$end = $endereco -> getStruct();
				break;
			default :
				break;
		}
		$pagina = 'formulario';
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

		$ret = $controller -> gridEvento(&$totalReg, $sortname, $sortorder, $page, $limit, $where);
		$data = array();
		$data['page'] = $pagination;

		$data['rows'] = array();

		foreach ((array) $ret as $key) {
			// $key['dataEvento'] = unmakeTimestamptoDate($key['dataEvento']);
			$data['rows'][] = array('id' => $key['idevento'], 'cell' => $key);
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
require_once (dirname(__FILE__) . '/evento/' . $pagina . '.php');
?>