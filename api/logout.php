<?php

session_start();

unset($_SESSION['mem'],$_SESSION['admin']);
// if(isset($_SESSION['cart'])){
// 	unset($_SESSION['cart']); 
// }
//每個購物網站不一 在會員登出後 會跟著清除購物車session 不然重新登入購物車紀錄仍存在 (在無關調瀏覽器狀況下);或是等session過期自動刪除
header('location:../index.php');


//一般來說,在外網頁 登出 一個多重身分(ex.客戶+管理員...)還有確認機制
//目前這樣寫法 當會員與管理員都登入時，不管誰logout會全部登出
//因為logout只使用到session_start()所以不特別include db
?>

