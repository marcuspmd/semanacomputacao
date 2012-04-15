<?PHP
require_once (dirname ( __FILE__ ) . '/../configs.php');
require_once (dirname ( __FILE__ ) . '/../model/edicao.model.php');
require_once (dirname ( __FILE__ ) . '/../utils/autoset.php');

class edicaoController extends edicaoModel{

	function __construct(){
		parent::__construct();
		
	}
	
	public function savePost($dados){
		if (autoset($this, $dados))
		return $this->salvar();
		
	}
	
	
	
}

?>