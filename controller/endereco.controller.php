<?PHP
require_once (dirname ( __FILE__ ) . '/../configs.php');
require_once (dirname ( __FILE__ ) . '/../model/endereco.model.php');
require_once (dirname ( __FILE__ ) . '/../utils/autoset.php');

class enderecoController extends enderecoModel{

	function __construct(){
		parent::__construct();
		
	}
	
	public function savePost($dados){
		if (autoset($this, $dados))
		return $this->salvar();
	}
	
	
	
}

?>