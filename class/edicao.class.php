<?PHP 
require_once (dirname ( __FILE__ ) . '/DBase.class.php');
require_once (dirname ( __FILE__ ) . '/../configs.php');

class edicao {
	protected $db; //Banco de dados
	private $changed; //para update
	private $idedicao = null;
	private $Descricao = null;
	
		function __construct(){
			if (is_null($this -> db)) {
				$this -> db = new DBASE();
			}
		}
		
		function __destruct() { }
		
		public function save(){
		$retorno = $this -> db -> table(_TABLE_EDICAO_)
					-> data ($this->getStruct())
					-> execute('insert');
		
		return $retorno;	
		}

		public function update(){
		if (!$this->changed)
			return true;
		
		$retorno = $this -> db -> table(_TABLE_EDICAO_)
					-> data ($this->getStruct())
					-> query ('idedicao = '.$this->idedicao)
					-> execute('update');
			
			return $retorno;
		}

		public function delete(){
			$retorno = $this -> db -> table(_TABLE_EDICAO_)
					-> query ('idedicao = '.$this->idedicao)
					-> execute('delete');
					
		return $retorno;
	}
		public function select($id){
			$retorno = $this -> db -> table(_TABLE_EDICAO_)
					-> query ('idedicao = '.$id )
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
	$data['idedicao']      = $this->idedicao;
	$data['Descricao']      = $this->Descricao;
	
	return $data;
	}

	public function setStruct($data)
	{
	$this->idedicao	= $data['idedicao'];
	$this->Descricao	= $data['Descricao'];
	}

	
	public function setIdedicao($idedicao)
	{
 		$this->changed = TRUE;
		$this->idedicao = $idedicao;
		return $this;
	}

	public function getIdedicao()
	{
		return $this->idedicao;
	}
	
	
	public function setDescricao($Descricao)
	{
 		$this->changed = TRUE;
		$this->Descricao = $Descricao;
		return $this;
	}

	public function getDescricao()
	{
		return $this->Descricao;
	}
	
}
?>