<?PHP 
require_once (dirname ( __FILE__ ) . '/DBase.class.php');
require_once (dirname ( __FILE__ ) . '/../configs.php');

class evento {
	protected $db; //Banco de dados
	private $changed; //para update
	private $idevento = null;
	private $edicao_idedicao = null;
	private $curso_idcurso = null;
	private $endereco_idendereco = null;
	private $usuario_palestrante = null;
	private $titulo = null;
	private $dataEvento = null;
	private $tipo = null;
	private $resumo = null;
	private $preRequisito = null;
	private $duracao = null;
	private $vagasDisponiveis = null;
	private $criado = null;
	private $modificado = null;
	private $ativo = null;
	
		function __construct(){
			if (is_null($this -> db)) {
				$this -> db = new DBASE();
			}
		}
		
		function __destruct() { }
		
		public function save(){
		$retorno = $this -> db -> table(_TABLE_EVENTO_)
					-> data ($this->getStruct())
					-> execute('insert');
		
		return $retorno;	
		}

		public function update(){
		if (!$this->changed)
			return true;
		
		$retorno = $this -> db -> table(_TABLE_EVENTO_)
					-> data ($this->getStruct())
					-> query ('idevento = '.$this->idevento)
					-> execute('update');
			
			return $retorno;
		}

		public function delete(){
			$retorno = $this -> db -> table(_TABLE_EVENTO_)
					-> query ('idevento = '.$this->idevento)
					-> execute('delete');
					
		return $retorno;
	}
		public function select($id){
			$retorno = $this -> db -> table(_TABLE_EVENTO_)
					-> query ('idevento = '.$id )
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
	$data['idevento']      = $this->idevento;
	$data['edicao_idedicao']      = $this->edicao_idedicao;
	$data['curso_idcurso']      = $this->curso_idcurso;
	$data['endereco_idendereco']      = $this->endereco_idendereco;
	$data['usuario_palestrante']      = $this->usuario_palestrante;
	$data['titulo']      = $this->titulo;
	$data['dataEvento']      = $this->dataEvento;
	$data['tipo']      = $this->tipo;
	$data['resumo']      = $this->resumo;
	$data['preRequisito']      = $this->preRequisito;
	$data['duracao']      = $this->duracao;
	$data['vagasDisponiveis']      = $this->vagasDisponiveis;
	$data['criado']      = $this->criado;
	$data['modificado']      = $this->modificado;
	$data['ativo']      = $this->ativo;
	
	return $data;
	}

	public function setStruct($data)
	{
	$this->idevento	= $data['idevento'];
	$this->edicao_idedicao	= $data['edicao_idedicao'];
	$this->curso_idcurso	= $data['curso_idcurso'];
	$this->endereco_idendereco	= $data['endereco_idendereco'];
	$this->usuario_palestrante	= $data['usuario_palestrante'];
	$this->titulo	= $data['titulo'];
	$this->dataEvento	= $data['dataEvento'];
	$this->tipo	= $data['tipo'];
	$this->resumo	= $data['resumo'];
	$this->preRequisito	= $data['preRequisito'];
	$this->duracao	= $data['duracao'];
	$this->vagasDisponiveis	= $data['vagasDisponiveis'];
	$this->criado	= $data['criado'];
	$this->modificado	= $data['modificado'];
	$this->ativo	= $data['ativo'];
	}

	
	public function setIdevento($idevento)
	{
 		$this->changed = TRUE;
		$this->idevento = $idevento;
		return $this;
	}

	public function getIdevento()
	{
		return $this->idevento;
	}
	
	
	public function setEdicao_idedicao($edicao_idedicao)
	{
 		$this->changed = TRUE;
		$this->edicao_idedicao = $edicao_idedicao;
		return $this;
	}

	public function getEdicao_idedicao()
	{
		return $this->edicao_idedicao;
	}
	
	
	public function setCurso_idcurso($curso_idcurso)
	{
 		$this->changed = TRUE;
		$this->curso_idcurso = $curso_idcurso;
		return $this;
	}

	public function getCurso_idcurso()
	{
		return $this->curso_idcurso;
	}
	
	
	public function setEndereco_idendereco($endereco_idendereco)
	{
 		$this->changed = TRUE;
		$this->endereco_idendereco = $endereco_idendereco;
		return $this;
	}

	public function getEndereco_idendereco()
	{
		return $this->endereco_idendereco;
	}
	
	
	public function setUsuario_palestrante($usuario_palestrante)
	{
 		$this->changed = TRUE;
		$this->usuario_palestrante = $usuario_palestrante;
		return $this;
	}

	public function getUsuario_palestrante()
	{
		return $this->usuario_palestrante;
	}
	
	
	public function setTitulo($titulo)
	{
 		$this->changed = TRUE;
		$this->titulo = $titulo;
		return $this;
	}

	public function getTitulo()
	{
		return $this->titulo;
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
	
	
	public function setTipo($tipo)
	{
 		$this->changed = TRUE;
		$this->tipo = $tipo;
		return $this;
	}

	public function getTipo()
	{
		return $this->tipo;
	}
	
	
	public function setResumo($resumo)
	{
 		$this->changed = TRUE;
		$this->resumo = $resumo;
		return $this;
	}

	public function getResumo()
	{
		return $this->resumo;
	}
	
	
	public function setPreRequisito($preRequisito)
	{
 		$this->changed = TRUE;
		$this->preRequisito = $preRequisito;
		return $this;
	}

	public function getPreRequisito()
	{
		return $this->preRequisito;
	}
	
	
	public function setDuracao($duracao)
	{
 		$this->changed = TRUE;
		$this->duracao = $duracao;
		return $this;
	}

	public function getDuracao()
	{
		return $this->duracao;
	}
	
	
	public function setVagasDisponiveis($vagasDisponiveis)
	{
 		$this->changed = TRUE;
		$this->vagasDisponiveis = $vagasDisponiveis;
		return $this;
	}

	public function getVagasDisponiveis()
	{
		return $this->vagasDisponiveis;
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
	
}
?>