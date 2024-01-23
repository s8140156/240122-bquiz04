<?php

include_once "db.php";

$table=$_POST['table']; //這邊會帶入table, acc, pw
unset($_POST['table']); //在這邊先拿掉table後
$db=new DB($table); 
$chk=$db->count($_POST); //在進資料庫去比對acc, pw

if($chk){
	echo $chk;
	$_SESSION[$table]=$_POST['acc']; //如果chk正確 就把post的table & acc存進session'tbale'參數
}else{
	echo  $chk;
}


?>