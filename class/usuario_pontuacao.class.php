<?PHP 
require_once (dirname ( __FILE__ ) . '/DBase.class.php');
require_once (dirname ( __FILE__ ) . '/../configs.php');

class usuario_pontuacao {
	protected $db; //Banco de dados
	private $changed; //para update
	private $usuario_idusuario = null;
	private $dataPontuacao = null;
	private $disciplina = null;
	
		function __construct(){
			if (is_null($this -> db)) {
				$this -> db = new DBASE();
			}
		}
		
		function __destruct() { }
		
		public function save(){
		$retorno = $this -> db -> table(_TABLE_USUARIO_PONTUACAO_)
					-> data ($this->getStruct())
					-> execute('insert');
		
		return $retorno;	
		}

		public function update(){
		if (!$this->changed)
			return true;
		
		$retorno = $this -> db -> table(_TABLE_USUARIO_PONTUACAO_)
					-> data ($this->getStruct())
					-> query ('usuario_idusuario = '.$this->usuario_idusuario)
					-> execute('update');
			
			return $retorno;
		}

		public function delete(){
			$retorno = $this -> db -> table(_TABLE_USUARIO_PONTUACAO_)
					-> query ('usuario_idusuario = '.$this->usuario_idusuario)
					-> execute('delete');
					
		return $retorno;
	}
		public function select($id){
			$retorno = $this -> db -> table(_TABLE_USUARIO_PONTUACAO_)
					-> query ('usuario_idusuario = '.$id )
					-> execute('select');
					
		if (count($retorno) > 0){
			$this->setStruct($retorno[0]);
			return true;
		}
		return false;
	}

	public function getStruct()
	{		
	$data = array();
	$data['usuario_idusuario']      = $this->usuario_idusuario;
	$data['dataPontuacao']      = $this->dataPontuacao;
	$data['disciplina']      = $this->disciplina;
	
	return $data;
	}

	public function setStruct($data)
	{
	$this->usuario_idusuario	= $data['usuario_idusuario'];
	$this->dataPontuacao	= $data['dataPontuacao'];
	$this->disciplina	= $data['disciplina'];
	}

	
	public function setUsuario_idusuario($usuario_idusuario)
	{
 		$this->changed = TRUE;
		$this->usuario_idusuario = $usuario_idusuario;
		return $this;
	}

	public function getUsuario_idusuario()
	{
		return $this->usuario_idusuario;
	}
	
	
	public function setDataPontuacao($dataPontuacao)
	{
 		$this->changed = TRUE;
		$this->dataPontuacao = $dataPontuacao;
		return $this;
	}

	public function getDataPontuacao()
	{
		return $this->dataPontuacao;
	}
	
	
	public function setDisciplina($disciplina)
	{
 		$this->changed = TRUE;
		$this->disciplina = $disciplina;
		return $this;
	}

	public function getDisciplina()
	{
		return $this->disciplina;
	}
	
}
?>