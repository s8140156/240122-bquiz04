<?php

include_once "db.php";

$_POST['pr']=serialize($_POST['pr']); //陣列變成字串 因為陣列無法存進資料庫
$Admin->save($_POST);
to("../back.php?do=admin");


?>