<h2 class="ct">訂單管理</h2>
	<table class="all">
		<tr>
			<th class="tt ct">訂單編號</th>
			<th class="tt ct">金額</th>
			<th class="tt ct">會員帳號</th>
			<th class="tt ct">姓名</th>
			<th class="tt ct">下單時間</th>
			<th class="tt ct">操作</th>
		</tr>
		<?php
		$rows=$Orders->all();
		foreach($rows as $row){

		?>
		<tr>
			<td class="pp ct"><a href="?do=detail&id=<?=$row['id'];?>">
				<?=$row['no'];?>
			</a>
			</td>
			<td class="pp ct"><?=$row['total'];?></td>
			<td class="pp ct"><?=$row['acc'];?></td>
			<td class="pp ct"><?=$row['name'];?></td>
			<td class="pp ct"><?=date("Y/m/d",strtotime($row['orderdate']));?></td>
			<!-- 因為orderdate資料類型是timestamp(包含詳細時分秒)所以要用date()然後strtotime(orderdate)來擷取年月日格式 -->
			<!-- 也可以用sub_str()擷取需要的欄位 -->
			<td class="pp ct">
			<?php	
			echo "<button onclick='del(&#39;orders&#39;,{$row['id']})'>刪除</button>";
		?>

			</td>
		</tr>
		<?php
				}
		?>
	</table>