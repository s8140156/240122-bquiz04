<?php include_once "db.php";

// $table=$_POST['table'];

$db=new DB($_POST['table']);
$db->del($_POST['id']);


?>