<?PHP 
require_once (dirname ( __FILE__ ) . '/DBase.class.php');
require_once (dirname ( __FILE__ ) . '/../configs.php');

class curso {
	protected $db; //Banco de dados
	private $changed; //para update
	protected $idcurso = null;
	protected $descricao = null;
	protected $abreviacao = null;
	protected $criado = null;
	protected $modificado = null;
	
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
	$data['abreviacao']      = $this->abreviacao;
	$data['criado']      = $this->criado;
	$data['modificado']      = $this->modificado;
	
	return $data;
	}

	public function setStruct($data)
	{
	$this->idcurso	= $data['idcurso'];
	$this->descricao	= $data['descricao'];
	$this->abreviacao	= $data['abreviacao'];
	$this->criado	= $data['criado'];
	$this->modificado	= $data['modificado'];
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
	
	
	public function setAbreviacao($abreviacao)
	{
 		$this->changed = TRUE;
		$this->abreviacao = $abreviacao;
		return $this;
	}

	public function getAbreviacao()
	{
		return $this->abreviacao;
	}
	
	
	public function setCriado($criado)
	{
 		$this->changed = TRUE;
		$this->criado = $criado;
		return $this;
	}

	public function getCriado()
	{
		return $this->criado;
	}
	
	
	public function setModificado($modificado)
	{
 		$this->changed = TRUE;
		$this->modificado = $modificado;
		return $this;
	}

	public function getModificado()
	{
		return $this->modificado;
	}
	
}
?>