<?PHP 
require_once (dirname ( __FILE__ ) . '/DBase.class.php');
require_once (dirname ( __FILE__ ) . '/../configs.php');

class usuario {
	protected $db; //Banco de dados
	private $changed; //para update
	private $idusuario = null;
	private $nome = null;
	private $curriculo = null;
	private $cfpCnpj = null;
	private $email = null;
	private $matricula = null;
	private $telefone = null;
	private $celular = null;
	private $tipoCadastro = null;
	private $senha = null;
	private $ativo = null;
	private $criado = null;
	private $modificado = null;
	
		function __construct(){
			if (is_null($this -> db)) {
				$this -> db = new DBASE();
			}
		}
		
		function __destruct() { }
		
		public function save(){
		$retorno = $this -> db -> table(_TABLE_USUARIO_)
					-> data ($this->getStruct())
					-> execute('insert');
		
		return $retorno;	
		}

		public function update(){
		if (!$this->changed)
			return true;
		
		$retorno = $this -> db -> table(_TABLE_USUARIO_)
					-> data ($this->getStruct())
					-> query ('idusuario = '.$this->idusuario)
					-> execute('update');
			
			return $retorno;
		}

		public function delete(){
			$retorno = $this -> db -> table(_TABLE_USUARIO_)
					-> query ('idusuario = '.$this->idusuario)
					-> execute('delete');
					
		return $retorno;
	}
		public function select($id){
			$retorno = $this -> db -> table(_TABLE_USUARIO_)
					-> query ('idusuario = '.$id )
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
	$data['idusuario']      = $this->idusuario;
	$data['nome']      = $this->nome;
	$data['curriculo']      = $this->curriculo;
	$data['cfpCnpj']      = $this->cfpCnpj;
	$data['email']      = $this->email;
	$data['matricula']      = $this->matricula;
	$data['telefone']      = $this->telefone;
	$data['celular']      = $this->celular;
	$data['tipoCadastro']      = $this->tipoCadastro;
	$data['senha']      = $this->senha;
	$data['ativo']      = $this->ativo;
	$data['criado']      = $this->criado;
	$data['modificado']      = $this->modificado;
	
	return $data;
	}

	public function setStruct($data)
	{
	$this->idusuario	= $data['idusuario'];
	$this->nome	= $data['nome'];
	$this->curriculo	= $data['curriculo'];
	$this->cfpCnpj	= $data['cfpCnpj'];
	$this->email	= $data['email'];
	$this->matricula	= $data['matricula'];
	$this->telefone	= $data['telefone'];
	$this->celular	= $data['celular'];
	$this->tipoCadastro	= $data['tipoCadastro'];
	$this->senha	= $data['senha'];
	$this->ativo	= $data['ativo'];
	$this->criado	= $data['criado'];
	$this->modificado	= $data['modificado'];
	}

	
	public function setIdusuario($idusuario)
	{
 		$this->changed = TRUE;
		$this->idusuario = $idusuario;
		return $this;
	}

	public function getIdusuario()
	{
		return $this->idusuario;
	}
	
	
	public function setNome($nome)
	{
 		$this->changed = TRUE;
		$this->nome = $nome;
		return $this;
	}

	public function getNome()
	{
		return $this->nome;
	}
	
	
	public function setCurriculo($curriculo)
	{
 		$this->changed = TRUE;
		$this->curriculo = $curriculo;
		return $this;
	}

	public function getCurriculo()
	{
		return $this->curriculo;
	}
	
	
	public function setCfpCnpj($cfpCnpj)
	{
 		$this->changed = TRUE;
		$this->cfpCnpj = $cfpCnpj;
		return $this;
	}

	public function getCfpCnpj()
	{
		return $this->cfpCnpj;
	}
	
	
	public function setEmail($email)
	{
 		$this->changed = TRUE;
		$this->email = $email;
		return $this;
	}

	public function getEmail()
	{
		return $this->email;
	}
	
	
	public function setMatricula($matricula)
	{
 		$this->changed = TRUE;
		$this->matricula = $matricula;
		return $this;
	}

	public function getMatricula()
	{
		return $this->matricula;
	}
	
	
	public function setTelefone($telefone)
	{
 		$this->changed = TRUE;
		$this->telefone = $telefone;
		return $this;
	}

	public function getTelefone()
	{
		return $this->telefone;
	}
	
	
	public function setCelular($celular)
	{
 		$this->changed = TRUE;
		$this->celular = $celular;
		return $this;
	}

	public function getCelular()
	{
		return $this->celular;
	}
	
	
	public function setTipoCadastro($tipoCadastro)
	{
 		$this->changed = TRUE;
		$this->tipoCadastro = $tipoCadastro;
		return $this;
	}

	public function getTipoCadastro()
	{
		return $this->tipoCadastro;
	}
	
	
	public function setSenha($senha)
	{
 		$this->changed = TRUE;
		$this->senha = $senha;
		return $this;
	}

	public function getSenha()
	{
		return $this->senha;
	}
	
	
	public function setAtivo($ativo)
	{
 		$this->changed = TRUE;
		$this->ativo = $ativo;
		return $this;
	}

	public function getAtivo()
	{
		return $this->ativo;
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