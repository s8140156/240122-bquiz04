<h2 class="ct">填寫資料</h2>
<!-- table.all>tr*6>td.tt.ct+td.pp>input:text -->
<?php
$row=$Mem->find(['acc'=>$_SESSION['mem']]);
?>
<form action="./api/order.php" method="post">
<table class="all">
	<tr>
		<td class="tt ct">帳號</td>
		<td class="pp">
			<?=$row['acc'];?>
			<!-- <input type="text" name="acc" id="acc"> --><!--因為帳號不能改 直接取資料即可-->
		</td>
	</tr>
	<tr>
		<td class="tt ct">姓名</td>
		<td class="pp"><input type="text" name="name" value="<?=$row['name'];?>"></td>
	</tr>
	<tr>
		<td class="tt ct">聯絡電話</td>
		<td class="pp"><input type="text" name="tel" value="<?=$row['tel'];?>"></td>
	</tr>
	<tr>
		<td class="tt ct">聯絡住址</td>
		<td class="pp"><input type="text" name="addr" value="<?=$row['addr'];?>"></td>
	</tr>
	<tr>
		<td class="tt ct">電子信箱</td>
		<td class="pp"><input type="text" name="email" value="<?=$row['email'];?>"></td>
	</tr>
</table>
<div class="ct">
	<input type="hidden" name="id" value=<?=$row['id'];?>>
	<input type="submit" value="編輯">
	<input type="reset" value="重置">
	<input type="button" value="取消" onclick="location.href='?do=mem'">
</div>
</form>
<?php
	if(isset($_GET['id'])){ //
		$_SESSION['cart'][$_GET['id']]=$_GET['qt'];
	}
if(!isset($_SESSION['mem'])){ //因為如果存在 要做很多事, 所以反過來先寫 else後面再去執行落落長
	to('?do=login');
}

echo "<h2 class='ct'>{$_SESSION['mem']}的購物車</h2>";

if(empty($_SESSION['cart'])){ //這邊原本以!isset判斷=>改empty 這樣當商品全部刪除 才能show下面
	echo "<h2 class='ct'>購物車中尚無商品</h2>";
}else{
	// dd($_SESSION['cart']);
}
?>
<table class="all">
	<tr class="tt ct">
		<td>商品名稱</td>
		<td>編號</td>
		<td>數量</td>
		<td>單價</td>
		<td>小計</td>

	</tr>
<?php
$sum=0;
foreach($_SESSION['cart'] as $id=>$qt){
	$goods=$Goods->find($id);
	?>
	<tr class="pp ct">
		<td><?=$goods['name'];?></td>
		<td><?=$goods['no'];?></td>
		<td><?=$qt;?></td>
		<td><?=$goods['price'];?></td>
		<td><?=$goods['price'] * $qt;?></td>

	</tr>
<?php
$sum+=$goods['price']*$qt;
}
?>
</table>