<?php include_once 'db.php';

$Mem->save($_POST);
to("../back.php?do=mem");

//如果要單獨寫編輯member寫法可以這樣
?>