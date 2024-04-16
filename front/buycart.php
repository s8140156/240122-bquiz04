<?php
	if(isset($_GET['id'])){ 
		$_SESSION['cart'][$_GET['id']]=$_GET['qt']; 
		//[$_GET['id']]是用id代表索引;$_GET［id］作為陣列的 key，$_GET['qt'] 則是 value (key=>value)
	}
if(!isset($_SESSION['mem'])){ //因為如果存在 要做很多事, 所以反過來先寫 else後面再去執行落落長
	to('?do=login');
}

echo "<h2 class='ct'>{$_SESSION['mem']}的購物車</h2>";

if(empty($_SESSION['cart'])){ //這邊原本以!isset判斷=>改empty 這樣當商品全部刪除 才能show下面
	echo "<h2 class='ct'>購物車中尚無商品</h2>";
}else{ //如果不加上else 在buycart會出現undefined array key 這是因為受29行的影響
	// dd($_SESSION['cart']);
	// 加上else這段是預防購物車沒東西時會有錯誤訊息顯示(會造成使用者觀感不好)

?>
<table class="all">
	<tr class="tt ct">
		<td>編號</td>
		<td>商品名稱</td>
		<td>數量</td>
		<td>庫存量</td>
		<td>單價</td>
		<td>小計</td>
		<td>刪除</td>
	</tr>
<?php
foreach($_SESSION['cart'] as $id => $qt){
	$goods=$Goods->find($id);
	?>
	<tr class="pp ct">
		<td><?=$goods['no'];?></td>
		<td><?=$goods['name'];?></td>
		<td><?=$qt;?></td>
		<td><?=$goods['stock'];?></td>
		<td><?=$goods['price'];?></td>
		<td><?=$goods['price'] * $qt;?></td>
		<td><img src="./icon/0415.jpg" onclick="delCart(<?=$id;?>)"></td>
	</tr>
<?php
}
?>
</table>
<div class="ct">
	<img src="./icon/0411.jpg" onclick="location.href='index.php'">
    <img src="./icon/0412.jpg" onclick="location.href='?do=checkout'">
</div>
<script>
	function delCart(id){
		$.post('./api/del_cart.php',{id},()=>{
			location.href='?do=buycart'; //這邊不使用reload()因為會造成最後一筆商品刪除不掉
		})

	}
</script>

<?php
} //這是購物車無商品的結束 需要包到script結尾後
?>


