<?php


require_once 'database.php';

$db = new database();

if(isset($GLOBALS['HTTP_RAW_POST_DATA']))
{
    $rawPostData = $GLOBALS['HTTP_RAW_POST_DATA'];
    
	header('Content-Type: application/xml');
    echo $db->CheckStatus($rawPostData);
}else
{
	$content_view = "info_view";

	$id = $_GET['id'];
	$Obj = $db->SelectZakaz($id);

	require_once("template_view.php"); 
}

?>