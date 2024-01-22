<h2>管理員登入</h2>
<img src="./icon/0413.jpg" onclick="location.href='?do=reg'">

<h2>會員登入</h2>
<!-- table.all>tr*3>td.tt.ct+td.pp>input:text -->
<table class="all">
	<tr>
		<td class="tt ct">帳號</td>
		<td class="pp"><input type="text" name="acc" id="acc"></td>
	</tr>
	<tr>
		<td class="tt ct">密碼</td>
		<td class="pp"><input type="password" name="pw" id="pw"></td>
	</tr>
	<tr>
		<td class="tt ct">驗證碼</td>
		<td class="pp">
			<?php
			$a=rand(10,99);
			$b=rand(10,99);
			$_SESSION['ans']=$a+$b; //存session at server client端看不到
			echo $a . "+" .$b . " ="; //注意字串寫法 可以讓=排版好看
			?>
			<input type="text" name="ans" id="ans"></td>
	</tr>
</table>
<div class="ct"><button onclick="login('admin')">確認</button></div>
<script>
	function login(table){
		$.get("./api/chk_ans.php",{ans:$("#ans").val()},(chk)=>{
			if(parseInt(chk)==0){
				alert("對不起，您輸入的驗證碼有誤，請您重新登入")
			}else{
				$.post("./api/chk_pw.php",{table,acc:$("#acc").val(),pw:$("#pw").val()},(res)=>{
					if(parseInt(res)==0){
						alert("帳號密碼錯誤，請重新輸入")
					}else{
						location.href='back.php?do=admin';
					}
				})
			}

		})
	}
</script>