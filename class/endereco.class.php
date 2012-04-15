<?PHP
require_once (dirname(__FILE__) . '/DBase.class.php');
require_once (dirname(__FILE__) . '/../configs.php');

class endereco {
	protected $db;
	//Banco de dados
	private $changed;
	//para update
	protected $idendereco = null;
	protected $cidade = null;
	protected $bairro = null;
	protected $rua = null;
	protected $numero = null;
	protected $complemento = null;
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
		$retorno = $this -> db -> table(_TABLE_ENDERECO_) -> data($this -> getStruct()) -> execute('insert');

		return $retorno;
	}

	public function update() {
		if (!$this -> changed)
			return true;

		$retorno = $this -> db -> table(_TABLE_ENDERECO_) -> data($this -> getStruct()) -> query('idendereco = ' . $this -> idendereco) -> execute('update');

		return $retorno;
	}

	public function delete() {
		$retorno = $this -> db -> table(_TABLE_ENDERECO_) -> query('idendereco = ' . $this -> idendereco) -> execute('delete');

		return $retorno;
	}

	public function select($id) {
		$retorno = $this -> db -> table(_TABLE_ENDERECO_) -> query('idendereco = ' . $id) -> execute('select');

		if (count($retorno) > 0) {
			$this -> setStruct($retorno[0]);
			return true;
		}
		return false;
	}

	public function getStruct() {
		$data = array();
		$data['idendereco'] = $this -> idendereco;
		$data['cidade'] = $this -> cidade;
		$data['bairro'] = $this -> bairro;
		$data['rua'] = $this -> rua;
		$data['numero'] = $this -> numero;
		$data['complemento'] = $this -> complemento;
		$data['criado'] = $this -> criado;
		$data['modificado'] = $this -> modificado;

		return $data;
	}

	public function setStruct($data) {
		$this -> idendereco = $data['idendereco'];
		$this -> cidade = $data['cidade'];
		$this -> bairro = $data['bairro'];
		$this -> rua = $data['rua'];
		$this -> numero = $data['numero'];
		$this -> complemento = $data['complemento'];
		$this -> criado = $data['criado'];
		$this -> modificado = $data['modificado'];
	}

	public function setIdendereco($idendereco) {
		$this -> changed = TRUE;
		$this -> idendereco = $idendereco;
		return $this;
	}

	public function getIdendereco() {
		return $this -> idendereco;
	}

	public function setCidade($cidade) {
		$this -> changed = TRUE;
		$this -> cidade = $cidade;
		return $this;
	}

	public function getCidade() {
		return $this -> cidade;
	}

	public function setBairro($bairro) {
		$this -> changed = TRUE;
		$this -> bairro = $bairro;
		return $this;
	}

	public function getBairro() {
		return $this -> bairro;
	}

	public function setRua($rua) {
		$this -> changed = TRUE;
		$this -> rua = $rua;
		return $this;
	}

	public function getRua() {
		return $this -> rua;
	}

	public function setNumero($numero) {
		$this -> changed = TRUE;
		$this -> numero = $numero;
		return $this;
	}

	public function getNumero() {
		return $this -> numero;
	}

	public function setComplemento($complemento) {
		$this -> changed = TRUE;
		$this -> complemento = $complemento;
		return $this;
	}

	public function getComplemento() {
		return $this -> complemento;
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