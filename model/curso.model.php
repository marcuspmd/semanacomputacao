<?PHP
require_once (dirname(__FILE__) . '/../configs.php');
require_once (dirname(__FILE__) . '/../class/curso.class.php');

class cursoModel extends curso {

	function __construct() {
		parent::__construct();

	}

	protected function salvar() {

		if (empty($this -> descricao))
			throw new Exception("Descrição em branco");

		if (empty($this -> idcurso)) {
			$this -> setCriado(date("Y-m-d H:i:s"));
			$this -> setModificado(date("Y-m-d H:i:s"));
			$this -> save();
			return $this -> select($this -> db -> getLastId());
		} else {
			$this -> setModificado(date("Y-m-d H:i:s"));
			return $this -> update();
		}
	}

	public function makeSelectCurso($selected = null) {
		$sql = 'select idcurso, descricao from curso order by descricao';
		$retorno = $this -> db -> executeSelectsSql($sql);
		foreach ((array)$retorno as $key) {
			$msg .= '<option value="' . $key['idcurso'] . '" ';
			if ($key['idcurso'] == $selected) {
				$msg .= 'selected="selected"';
			}
			$msg .= ' >' . $key['descricao'] . '</option>';
		}
		return $msg;
	}

}
?>