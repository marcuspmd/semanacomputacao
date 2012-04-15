<?PHP
require_once (dirname(__FILE__) . '/../configs.php');
require_once (dirname(__FILE__) . '/../class/edicao.class.php');

class edicaoModel extends edicao {

	function __construct() {
		parent::__construct();

	}

	protected function salvar() {

		if (empty($this -> idedicao)) {
			$this -> setCriado(date("Y-m-d H:i:s"));
			$this -> setModificado(date("Y-m-d H:i:s"));
			$this -> save();
			return $this -> select($this -> db -> getLastId());
		} else {
			$this -> setModificado(date("Y-m-d H:i:s"));
			return $this -> update();
		}
	}

	public function makeSelectEdicao($selected = null) {
		$sql = 'select idedicao, descricao from edicao order by descricao';
		$retorno = $this -> db -> executeSelectsSql($sql);
		foreach ((array)$retorno as $key) {
			$msg .= '<option value="' . $key['idedicao'] . '" ';
			if ($key['idedicao'] == $selected) {
				$msg .= 'selected="selected"';
			}
			$msg .= ' >' . $key['descricao'] . '</option>';
		}
		return $msg;
	}

}
?>