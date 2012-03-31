<?php 
require_once (dirname ( __FILE__ ) . '/../controllers/file.controller.php');
$id = $_REQUEST['id'];
$file = new fileController();
$arquivo = $file->selectFile($id);


   header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename={$arquivo['filename']}");
	header("Content-Type: ".$arquivo['mimetype']);
    header("Content-Transfer-Encoding: binary");

echo $arquivo['body'];

?>