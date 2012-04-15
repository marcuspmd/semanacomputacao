<?PHP
require_once (dirname ( __FILE__ ) . '/../configs.php');
require_once (dirname ( __FILE__ ) . '/../class/evento.class.php');

class eventoModel extends evento{

	function __construct(){
		parent::__construct();
		
	}
	
	protected function salvar(){
		if (empty($this->titulo))
			throw new Exception("Titulo em branco");
		
		if (empty($this->curso_idcurso))
			throw new Exception("Necessario escolher um curso");
		
		if (empty($this->usuario_palestrante))
			throw new Exception("Necessario escolher um palestrante");

		if (empty($this->edicao_idedicao))
			throw new Exception("Necessario escolher um edicao");
		

		if (empty($this->idevento)){
			$this->setCriado(date("Y-m-d H:i:s"));
			$this->setModificado(date("Y-m-d H:i:s"));
			$this->setAtivo(1);
			$this->save();
			return $this->select($this->db->getLastId());
		}else{
			$this->setModificado(date("Y-m-d H:i:s"));
			return $this->update();
		}
	}
	
	public function makeSelectEdicao($selected = null) {

	}
	
}

?>