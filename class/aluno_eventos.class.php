<?PHP 
require_once (dirname ( __FILE__ ) . '/DBase.class.php');
require_once (dirname ( __FILE__ ) . '/../configs.php');

class aluno_eventos {
	protected $db; //Banco de dados
	private $changed; //para update
	private $usuario_idusuario = null;
	private $evento_idevento = null;
	private $dataEvento = null;
	private $presenca = null;
	
		function __construct(){
			if (is_null($this -> db)) {
				$this -> db = new DBASE();
			}
		}
		
		function __destruct() { }
		
		public function save(){
		$retorno = $this -> db -> table(_TABLE_ALUNO_EVENTOS_)
					-> data ($this->getStruct())
					-> execute('insert');
		
		return $retorno;	
		}

		public function update(){
		if (!$this->changed)
			return true;
		
		$retorno = $this -> db -> table(_TABLE_ALUNO_EVENTOS_)
					-> data ($this->getStruct())
					-> query ('usuario_idusuario = '.$this->usuario_idusuario)
					-> execute('update');
			
			return $retorno;
		}

		public function delete(){
			$retorno = $this -> db -> table(_TABLE_ALUNO_EVENTOS_)
					-> query ('usuario_idusuario = '.$this->usuario_idusuario)
					-> execute('delete');
					
		return $retorno;
	}
		public function select($id){
			$retorno = $this -> db -> table(_TABLE_ALUNO_EVENTOS_)
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
	$data['evento_idevento']      = $this->evento_idevento;
	$data['dataEvento']      = $this->dataEvento;
	$data['presenca']      = $this->presenca;
	
	return $data;
	}

	public function setStruct($data)
	{
	$this->usuario_idusuario	= $data['usuario_idusuario'];
	$this->evento_idevento	= $data['evento_idevento'];
	$this->dataEvento	= $data['dataEvento'];
	$this->presenca	= $data['presenca'];
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
	
	
	public function setEvento_idevento($evento_idevento)
	{
 		$this->changed = TRUE;
		$this->evento_idevento = $evento_idevento;
		return $this;
	}

	public function getEvento_idevento()
	{
		return $this->evento_idevento;
	}
	
	
	public function setDataEvento($dataEvento)
	{
 		$this->changed = TRUE;
		$this->dataEvento = $dataEvento;
		return $this;
	}

	public function getDataEvento()
	{
		return $this->dataEvento;
	}
	
	
	public function setPresenca($presenca)
	{
 		$this->changed = TRUE;
		$this->presenca = $presenca;
		return $this;
	}

	public function getPresenca()
	{
		return $this->presenca;
	}
	
}
?>