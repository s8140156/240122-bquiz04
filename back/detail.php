<?php
$row=$Orders->find($_GET['id']);
?>

<h2 class="ct">訂單編號<span style="color:red"><?=$row['no'];?></span>的詳細資料</h2>
<!-- table.all>tr*6>td.tt.ct+td.pp>input:text -->
<!-- <form action="./api/order.php" method="post">  --> <!--不需要表單-->
<table class="all">
	<tr>
		<td class="tt ct">登入帳號</td>
		<td class="pp">
			<?=$row['acc'];?>
			<!-- <input type="text" name="acc" id="acc"> --><!--因為帳號不能改 直接取資料即可-->
		</td>
	</tr>
	<tr>
		<td class="tt ct">姓名</td>
		<!-- <td class="pp"><input type="text" name="name" value="<?=$row['name'];?>"></td> -->
		<td class="pp"><?=$row['name'];?></td>
	</tr>
	<tr>
		<td class="tt ct">聯絡電話</td>
		<!-- <td class="pp"><input type="text" name="tel" value="<?=$row['tel'];?>"></td> -->
		<td class="pp"><?=$row['tel'];?></td>
	</tr>
	<tr>
		<td class="tt ct">聯絡住址</td>
		<!-- <td class="pp"><input type="text" name="addr" value="<?=$row['addr'];?>"></td> -->
		<td class="pp"><?=$row['addr'];?></td>
	</tr>
	<tr>
		<td class="tt ct">電子信箱</td>
		<td class="pp"><input type="text" style="border:0;background:#EFCA85" name="email" value="<?=$row['email'];?>"></td>
		<!-- <td class="pp"><?=$row['email'];?></td> -->
	</tr>
</table>
<table class="all">
	<tr class="tt ct">
		<td>編號</td>
		<td>商品名稱</td>
		<td>數量</td>
		<td>單價</td>
		<td>小計</td>

	</tr>
<?php
$sum=0;
$cart=unserialize($row['cart']); //
foreach($_SESSION['cart'] as $id => $qt){
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
// $sum+=$goods['price'] * $qt;
}
?>
</table>
<div class="all ct tt">總價：<?=$row['total'];?>元</div>
<div class="ct">
	<!-- <input type="submit" value="確定送出"> -->
	<!-- <input type="button" value="返回" onclick="location.href='?do=order'"> -->
	<button onclick="location.href='?do=order'">返回</button>
</div>
<!-- </form> -->
<!-- 從上面表單上可取得的欄位幾乎都有只剩總計(後面使用hidden total欄位存sum)及訂單編號(要新增)/cart,acc使用session來取得儲存 -->