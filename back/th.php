<h2 class="ct">商品分類</h2>
<div class="ct">
	新增大分類 <input type="text" name="big" id="big"><button onclick="addType('big')">新增</button></div>
<div class="ct">
	新增中分類
	<select name="big" id="bigs"></select>
	<input type="text" name="mid" id="mid"><button onclick="addType('mid')">新增</button>
</div>
<!-- table.all>(tr.tt>td+td.ct>button*2)+(tr.tt.ct>td*2) -->
<table class="all">
	<?php
$bigs=$Type->all(['big_id'=>0]);
foreach($bigs as $big){
	?>
	<tr class="tt">
		<td><?=$big['name'];?></td>
		<td class="ct">
			<button onclick="edit(this,<?=$big['id'];?>)">修改</button> <!--DOM-->
			<button onclick="del('type',<?=$big['id'];?>)">刪除</button>
		</td>
	</tr>
	<?php
	$mids=$Type->all(['big_id'=>$big['id']]);
	foreach($mids as $mid){
		?>
			<tr class="pp ct">
				<td><?=$mid['name'];?></td>
				<td>
					<button onclick="edit(this,<?=$mid['id'];?>)">修改</button>
					<button onclick="del('type',<?=$mid['id'];?>)">刪除</button>
				</td>
			</tr>
		<?php
	}
	}
	?>
</table>
<script>
	getTypes(0) //因為在中分類裡面放的選單是大分類big_id為0

	function edit(dom,id){ //透過DOM traveling找節點並修改文字
		let name=prompt("請輸入您要修改的分類名稱:",`${$(dom).parent().prev().text()}`)
		if(name!=null){
			$.post("./api/save_type.php",{name,id},()=>{
				$(dom).parent().prev().text(name)
				// location.reload();
			})
		}
	}

	function getTypes(big_id){ //取得選單(放上大分類的選單)
		$.get("./api/get_types.php",{big_id},(types)=>{
			$('#bigs').html(types)
		})
	}


	function addType(type){
		let name
		let big_id
		switch(type){
			case 'big':
				name=$('#big').val();
				big_id=0;
			break;
			case 'mid':
				name=$('#mid').val();
				big_id=$('#bigs').val();
			break;
		} //因為送去api存進資料庫方式都一樣, 所以不用送type參數
		$.post("./api/save_type.php",{name,big_id},()=>{
			location.reload();
		})
	}
</script>
<h2 class="ct">商品管理</h2>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>
<table class="all">
	<tr class="tt ct">
		<th>編號</th>
		<th>商品名稱</th>
		<th>庫存量</th>
		<th>狀態</th>
		<th>操作</th>
	</tr>
	<?php
	$goods=$Goods->all();
	foreach($goods as $good){


	?>
	<tr class="pp">
		<td><?=$good['no'];?></td>
		<td><?=$good['name'];?></td>
		<td><?=$good['stock'];?></td>
		<td><?=($good['sh']==1)?'上架':'下架';?></td>
		<td style="width:120px">
			<button>修改</button>
			<button onclick="del('goods',<?=$good['id'];?>)">刪除</button>
			<button onclick="sh('1',<?=$good['id'];?>)">上架</button>
			<button onclick="sh('0',<?=$good['id'];?>)">下架</button>
		</td>
	</tr>
	<?php	
	}
	?>
</table>
<script>
	function sh(sh,id){
		$.post('./api/sh.php',{id,sh},()=>{
			location.reload()
		})
	}
</script>