<?php

include_once "db.php";

if(!empty($_FILES['img']['tmp_name'])){
	$_POST['img']=$_FILES['img']['name'];
	move_uploaded_file($_FILES['img']['tmp_name'],"../img/{$_FILES['img']['name']}");
}

if(!isset($_POST['id'])){ //增加可編輯 所以要判斷是否有id 沒id代表新增
	$_POST['no']=rand(100000,999999);
	$_POST['sh']=1;

}


$Goods->save($_POST);
to("../back.php?do=th")


?>