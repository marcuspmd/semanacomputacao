<?PHP
require_once (dirname(__FILE__) . '/DBase.class.php');
require_once (dirname(__FILE__) . '/../configs.php');

class edicao {
	protected $db;
	//Banco de dados
	private $changed;
	//para update
	protected $idedicao = null;
	protected $descricao = null;
	protected $criado = null;
	protected $modificado = null;

	function __construct() {
		if (is_null($this -> db)) {
			$this -> db = new DBASE();
		}
	}

	function __destruct() {
	}

	public function save() {
		$retorno = $this -> db -> table(_TABLE_EDICAO_) -> data($this -> getStruct()) -> execute('insert');

		return $retorno;
	}

	public function update() {
		if (!$this -> changed)
			return true;

		$retorno = $this -> db -> table(_TABLE_EDICAO_) -> data($this -> getStruct()) -> query('idedicao = ' . $this -> idedicao) -> execute('update');

		return $retorno;
	}

	public function delete() {
		$retorno = $this -> db -> table(_TABLE_EDICAO_) -> query('idedicao = ' . $this -> idedicao) -> execute('delete');

		return $retorno;
	}

	public function select($id) {
		$retorno = $this -> db -> table(_TABLE_EDICAO_) -> query('idedicao = ' . $id) -> execute('select');

		if (count($retorno) > 0) {
			$this -> setStruct($retorno[0]);
			return true;
		}
		return false;
	}

	public function getStruct() {
		$data = array();
		$data['idedicao'] = $this -> idedicao;
		$data['descricao'] = $this -> descricao;
		$data['criado'] = $this -> criado;
		$data['modificado'] = $this -> modificado;

		return $data;
	}

	public function setStruct($data) {
		$this -> idedicao = $data['idedicao'];
		$this -> descricao = $data['descricao'];
		$this -> criado = $data['criado'];
		$this -> modificado = $data['modificado'];
	}

	public function setIdedicao($idedicao) {
		$this -> changed = TRUE;
		$this -> idedicao = $idedicao;
		return $this;
	}

	public function getIdedicao() {
		return $this -> idedicao;
	}

	public function setDescricao($descricao) {
		$this -> changed = TRUE;
		$this -> descricao = $descricao;
		return $this;
	}

	public function getDescricao() {
		return $this -> descricao;
	}

	public function setCriado($criado) {
		$this -> changed = TRUE;
		$this -> criado = $criado;
		return $this;
	}

	public function getCriado() {
		return $this -> criado;
	}

	public function setModificado($modificado) {
		$this -> changed = TRUE;
		$this -> modificado = $modificado;
		return $this;
	}

	public function getModificado() {
		return $this -> modificado;
	}

}
?>