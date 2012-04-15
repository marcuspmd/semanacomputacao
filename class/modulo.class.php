<?PHP
require_once (dirname(__FILE__) . '/DBase.class.php');
require_once (dirname(__FILE__) . '/../configs.php');

class modulo {
	protected $db;
	//Banco de dados
	private $changed;
	//para update
	protected $idmodulo = null;
	protected $descricao = null;

	function __construct() {
		if (is_null($this -> db)) {
			$this -> db = new DBASE();
		}
	}

	function __destruct() {
	}

	public function save() {
		$retorno = $this -> db -> table(_TABLE_MODULO_) -> data($this -> getStruct()) -> execute('insert');

		return $retorno;
	}

	public function update() {
		if (!$this -> changed)
			return true;

		$retorno = $this -> db -> table(_TABLE_MODULO_) -> data($this -> getStruct()) -> query('idmodulo = ' . $this -> idmodulo) -> execute('update');

		return $retorno;
	}

	public function delete() {
		$retorno = $this -> db -> table(_TABLE_MODULO_) -> query('idmodulo = ' . $this -> idmodulo) -> execute('delete');

		return $retorno;
	}

	public function select($id) {
		$retorno = $this -> db -> table(_TABLE_MODULO_) -> query('idmodulo = ' . $id) -> execute('select');

		if (count($retorno) > 0) {
			$this -> setStruct($retorno[0]);
			return true;
		}
		return false;
	}

	public function getStruct() {
		$data = array();
		$data['idmodulo'] = $this -> idmodulo;
		$data['descricao'] = $this -> descricao;

		return $data;
	}

	public function setStruct($data) {
		$this -> idmodulo = $data['idmodulo'];
		$this -> descricao = $data['descricao'];
	}

	public function setIdmodulo($idmodulo) {
		$this -> changed = TRUE;
		$this -> idmodulo = $idmodulo;
		return $this;
	}

	public function getIdmodulo() {
		return $this -> idmodulo;
	}

	public function setDescricao($descricao) {
		$this -> changed = TRUE;
		$this -> descricao = $descricao;
		return $this;
	}

	public function getDescricao() {
		return $this -> descricao;
	}

}
?>