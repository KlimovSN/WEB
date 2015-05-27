<?php


require_once 'database.php';
$content_view = "info_view";

$db = new database();

$id = $_GET['id'];
$Obj = $db->SelectZakaz($id);

require_once("template_view.php"); 


?>