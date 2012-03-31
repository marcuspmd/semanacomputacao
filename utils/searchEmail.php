<?PHP
$aux = '';
$codigo = file_get_contents('http://vagasadvogados.blogspot.com/search?updated-max=2011-08-01T21:22:00-03:00&max-results=20&start=20&by-date=false');
$keywords = preg_match_all("/[a-zA-Z0-9\._+]+[@]+[a-zA-Z0-9\.]+[a-zA-Z\.]{2}/", $codigo,$retorno);
$aux[] = $retorno;
$codigo = file_get_contents('http://vagasadvogados.blogspot.com/search?updated-max=2011-07-19T21:00:00-03:00&max-results=1000000&start=74&by-date=false');
$keywords = preg_match_all("/[a-zA-Z0-9\._+]+[@]+[a-zA-Z0-9\.]+[a-zA-Z\.]{2}/", $codigo,$retorno);
$aux[] = $retorno;
$codigo = file_get_contents('http://vagasadvogados.blogspot.com/search?updated-max=2011-07-07T19:44:00-03:00&max-results=1000000&start=126&by-date=false');
$keywords = preg_match_all("/[a-zA-Z0-9\._+]+[@]+[a-zA-Z0-9\.]+[a-zA-Z\.]{2}/", $codigo,$retorno);
$aux[] = $retorno;
$codigo = file_get_contents('http://vagasadvogados.blogspot.com/search?updated-max=2011-04-26T22:50:00-03:00&max-results=1000000&start=172&by-date=false');
$keywords = preg_match_all("/[a-zA-Z0-9\._+]+[@]+[a-zA-Z0-9\.]+[a-zA-Z\.]{2}/", $codigo,$retorno);
$codigo = file_get_contents('http://vagasadvogados.blogspot.com/search?updated-max=2011-04-14T21:44:00-03:00&max-results=1000000&start=221&by-date=false');
$keywords = preg_match_all("/[a-zA-Z0-9\._+]+[@]+[a-zA-Z0-9\.]+[a-zA-Z\.]{2}/", $codigo,$retorno);
$aux[] = $retorno;
$codigo = file_get_contents('http://vagasadvogados.blogspot.com/search?updated-max=2011-04-05T23:20:00-03:00&max-results=1000000&start=269&by-date=false');
$keywords = preg_match_all("/[a-zA-Z0-9\._+]+[@]+[a-zA-Z0-9\.]+[a-zA-Z\.]{2}/", $codigo,$retorno);
$aux[] = $retorno;
$codigo = file_get_contents('http://vagasadvogados.blogspot.com/search?updated-max=2010-12-07T23:39:00-02:00&max-results=1000000&start=347&by-date=false');

$keywords = preg_match_all("/[a-zA-Z0-9\._+]+[@]+[a-zA-Z0-9\.]+[a-zA-Z\.]{2}/", $codigo,$retorno);
$aux[] = $retorno;

print_r($aux);



?>
