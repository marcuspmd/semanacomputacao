<?PHP
require_once (dirname ( __FILE__ ) . '/../configs.php');
require_once (dirname ( __FILE__ ) . '/../model/curso.model.php');
require_once (dirname ( __FILE__ ) . '/../utils/autoset.php');

class cursoController extends cursoModel{

	function __construct(){
		parent::__construct();
		
	}
	
	public function savePost($dados){
		if (autoset($this, $dados))
		return $this->salvar();
		
	}
	
	
	
}

?>