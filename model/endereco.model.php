<?PHP
require_once (dirname ( __FILE__ ) . '/../configs.php');
require_once (dirname ( __FILE__ ) . '/../class/endereco.class.php');

class enderecoModel extends endereco{

	function __construct(){
		parent::__construct();
		
	}
	
	protected function salvar(){
		
		

		if (empty($this->idendereco)){
			$this->setCriado(date("Y-m-d H:i:s"));
			$this->setModificado(date("Y-m-d H:i:s"));
			$this->save();
			return $this->select($this->db->getLastId());
		}else{
			$this->setModificado(date("Y-m-d H:i:s"));
			return $this->update();
		}
	}
	
	
}

?>