<?php

include_once "db.php";

$_POST['no']=date("Ymd").rand(100000,999999); //這邊注意日期格是不能有-分隔 要連在一起
$_POST['cart']=serialize($_SESSION['cart']);
$_POST['acc']=$_SESSION['mem'];

$Orders->save($_POST);
// unset($_SESSION['cart']);
// 如果在購物完成後,可以加上unset session清除購物車
//可是老師是說大部分是不清的...why?



?>
<script>
	alert("訂購成功，\n感謝您的選購");
	location.href="../index.php";
	//** 盡量每個資料夾都有index
	//將js(alert,prompt,confirm等)寫在api資料夾底下 這類程式會讓整個畫面時間點先中斷,有點讓畫面先鎖死並無法點其他連結直到點擊確認
	//網址上會show出路徑會造成有心人士利用 這類程式還是應該寫在前端
</script>