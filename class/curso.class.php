<?PHP 
require_once (dirname ( __FILE__ ) . '/DBase.class.php');
require_once (dirname ( __FILE__ ) . '/../configs.php');

class curso {
	protected $db; //Banco de dados
	private $changed; //para update
	private $idcurso = null;
	private $descricao = null;
	
		function __construct(){
			if (is_null($this -> db)) {
				$this -> db = new DBASE();
			}
		}
		
		function __destruct() { }
		
		public function save(){
		$retorno = $this -> db -> table(_TABLE_CURSO_)
					-> data ($this->getStruct())
					-> execute('insert');
		
		return $retorno;	
		}

		public function update(){
		if (!$this->changed)
			return true;
		
		$retorno = $this -> db -> table(_TABLE_CURSO_)
					-> data ($this->getStruct())
					-> query ('idcurso = '.$this->idcurso)
					-> execute('update');
			
			return $retorno;
		}

		public function delete(){
			$retorno = $this -> db -> table(_TABLE_CURSO_)
					-> query ('idcurso = '.$this->idcurso)
					-> execute('delete');
					
		return $retorno;
	}
		public function select($id){
			$retorno = $this -> db -> table(_TABLE_CURSO_)
					-> query ('idcurso = '.$id )
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
	$data['idcurso']      = $this->idcurso;
	$data['descricao']      = $this->descricao;
	
	return $data;
	}

	public function setStruct($data)
	{
	$this->idcurso	= $data['idcurso'];
	$this->descricao	= $data['descricao'];
	}

	
	public function setIdcurso($idcurso)
	{
 		$this->changed = TRUE;
		$this->idcurso = $idcurso;
		return $this;
	}

	public function getIdcurso()
	{
		return $this->idcurso;
	}
	
	
	public function setDescricao($descricao)
	{
 		$this->changed = TRUE;
		$this->descricao = $descricao;
		return $this;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}
	
}
?>