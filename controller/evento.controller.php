<?PHP
require_once (dirname ( __FILE__ ) . '/../configs.php');
require_once (dirname ( __FILE__ ) . '/../model/evento.model.php');
require_once (dirname ( __FILE__ ) . '/../utils/autoset.php');

class eventoController extends eventoModel{

	function __construct(){
		parent::__construct();
		
	}
	
	public function savePost($dados){
		if (autoset($this, $dados))
		if ($this->salvar()){
			return $this->db->getLastId();
		}
			
	}
	
	
	
}

?>