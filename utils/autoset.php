<?php 
function autoset(&$controller, $dados){
	
	foreach ($dados as $key => $value){
		if ((!empty($value)) || ($value == 0)){
			list($tabela,$nomefuncao) = explode('__',$key);
			$funcaoExiste = method_exists($controller, 'set'.ucfirst($nomefuncao).'');
			if ($funcaoExiste){
				$pop = 'set'.ucfirst($nomefuncao).'(\''.$value.'\');';
				eval("\$controller->$pop");
			}
		}
	}
	return true;
}

function separarArrays($array){
	$retorno = '';
	foreach ($array as $key=>$value){
		list($tabela,$campo) = explode('__',$key);
			$retorno[$tabela][$campo] = $value;
	}
	foreach ($retorno as $key2=>$key1){
		foreach($key1 as $key=>$value){
			$aux[$key2.'__'.$key] = $value; 			
		}
		$ret[$key2] = $aux;
		$aux = '';
	}
	return $ret;
}

?>