<?php 
function makeData($data){
	list($dia,$mes,$ano) = explode('-',$data);
	return "$ano-$mes-$dia";
}

function unMakeData($data){
	list($ano,$mes,$dia) = explode('-',$data);
	return "$dia-$mes-$ano";
}

function makeTimestamp($data){
	list($dia,$mes,$resto) = explode('-',$data);
	list($ano, $resto) = explode (' ', $resto);
	list($hora, $min, $seg) = explode(':', $resto);
	return "$ano-$mes-$dia $hora:$min:$seg";
}

function unmakeTimestamp($data){
	list($ano,$mes,$resto) = explode('-',$data);
	list($dia, $resto) = explode (' ', $resto);
	list($hora, $min, $seg) = explode(':', $resto);
	return "$dia-$mes-$ano $hora:$min:$seg";
}

function addDays($start, $d){
	switch($d){
		case 0:
			$timestamp = strtotime('now');
			break;
		case 1:
			$timestamp = strtotime($start .'+'.$d.' day');
			break;
		default:
			$timestamp = strtotime($start.'+'.$d.' days');
			break;
	}
	
	return date('Y-m-d', $timestamp);
}

?>