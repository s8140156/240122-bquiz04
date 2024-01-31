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
	<tr class="tt">
		<td>流行皮件</td>
		<td class="ct">
			<button>修改</button>
			<button>刪除</button>
		</td>
	</tr>
	<tr class="pp ct">
		<td>女用皮件</td>
		<td>
			<button>修改</button>
			<button>刪除</button>
		</td>
	</tr>
</table>
<script>
	getTypes(0)

	function getTypes(big_id){
		$.get("./api/get_types.php",{big_id},(types)=>{
			$('#bigs').html(types)
		})
	}


	function addType(type){
		let name
		let big_idl
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
<div class="ct"><button>新增商品</button></div>
<table class="all">
	<tr class="tt ct">
		<th>編號</th>
		<th>商品名稱</th>
		<th>庫存量</th>
		<th>狀態</th>
		<th>操作</th>
	</tr>
	<tr class="pp">
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>
			<button>修改</button>
			<button>刪除</button>
			<button>上架</button>
			<button>下架</button>
		</td>
	</tr>
</table>