<?PHP 
require_once (dirname ( __FILE__ ) . '/DBase.class.php');
require_once (dirname ( __FILE__ ) . '/../configs.php');

class permissao {
	protected $db; //Banco de dados
	private $changed; //para update
	private $idpermissao = null;
	private $usuario_idusuario = null;
	private $modulo_idmodulo = null;
	private $createM = null;
	private $readM = null;
	private $updateM = null;
	private $deleteM = null;
	private $adicional = null;
	
		function __construct(){
			if (is_null($this -> db)) {
				$this -> db = new DBASE();
			}
		}
		
		function __destruct() { }
		
		public function save(){
		$retorno = $this -> db -> table(_TABLE_PERMISSAO_)
					-> data ($this->getStruct())
					-> execute('insert');
		
		return $retorno;	
		}

		public function update(){
		if (!$this->changed)
			return true;
		
		$retorno = $this -> db -> table(_TABLE_PERMISSAO_)
					-> data ($this->getStruct())
					-> query ('idpermissao = '.$this->idpermissao)
					-> execute('update');
			
			return $retorno;
		}

		public function delete(){
			$retorno = $this -> db -> table(_TABLE_PERMISSAO_)
					-> query ('idpermissao = '.$this->idpermissao)
					-> execute('delete');
					
		return $retorno;
	}
		public function select($id){
			$retorno = $this -> db -> table(_TABLE_PERMISSAO_)
					-> query ('idpermissao = '.$id )
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
	$data['idpermissao']      = $this->idpermissao;
	$data['usuario_idusuario']      = $this->usuario_idusuario;
	$data['modulo_idmodulo']      = $this->modulo_idmodulo;
	$data['createM']      = $this->createM;
	$data['readM']      = $this->readM;
	$data['updateM']      = $this->updateM;
	$data['deleteM']      = $this->deleteM;
	$data['adicional']      = $this->adicional;
	
	return $data;
	}

	public function setStruct($data)
	{
	$this->idpermissao	= $data['idpermissao'];
	$this->usuario_idusuario	= $data['usuario_idusuario'];
	$this->modulo_idmodulo	= $data['modulo_idmodulo'];
	$this->createM	= $data['createM'];
	$this->readM	= $data['readM'];
	$this->updateM	= $data['updateM'];
	$this->deleteM	= $data['deleteM'];
	$this->adicional	= $data['adicional'];
	}

	
	public function setIdpermissao($idpermissao)
	{
 		$this->changed = TRUE;
		$this->idpermissao = $idpermissao;
		return $this;
	}

	public function getIdpermissao()
	{
		return $this->idpermissao;
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
	
	
	public function setModulo_idmodulo($modulo_idmodulo)
	{
 		$this->changed = TRUE;
		$this->modulo_idmodulo = $modulo_idmodulo;
		return $this;
	}

	public function getModulo_idmodulo()
	{
		return $this->modulo_idmodulo;
	}
	
	
	public function setCreateM($createM)
	{
 		$this->changed = TRUE;
		$this->createM = $createM;
		return $this;
	}

	public function getCreateM()
	{
		return $this->createM;
	}
	
	
	public function setReadM($readM)
	{
 		$this->changed = TRUE;
		$this->readM = $readM;
		return $this;
	}

	public function getReadM()
	{
		return $this->readM;
	}
	
	
	public function setUpdateM($updateM)
	{
 		$this->changed = TRUE;
		$this->updateM = $updateM;
		return $this;
	}

	public function getUpdateM()
	{
		return $this->updateM;
	}
	
	
	public function setDeleteM($deleteM)
	{
 		$this->changed = TRUE;
		$this->deleteM = $deleteM;
		return $this;
	}

	public function getDeleteM()
	{
		return $this->deleteM;
	}
	
	
	public function setAdicional($adicional)
	{
 		$this->changed = TRUE;
		$this->adicional = $adicional;
		return $this;
	}

	public function getAdicional()
	{
		return $this->adicional;
	}
	
}
?>