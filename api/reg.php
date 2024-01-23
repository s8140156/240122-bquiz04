<?php

include_once "db.php";

$_POST['regdate']=date("Y-m-d"); //因為題目要求要有註冊日期 所以當post過來沒這欄位要多增加這個"欄位"存入
$Mem->save($_POST); //所以才能直接存$_POST

?>