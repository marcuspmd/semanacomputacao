<?php 
require_once (dirname ( __FILE__ ) . '/../controllers/photos.controller.php');
$image = $_REQUEST['image'];
$photo = new Photos();
$img = $photo->selectPhoto($image);

header("Content-Type: ".$img['mimetype']);
echo $img['body'];

?>