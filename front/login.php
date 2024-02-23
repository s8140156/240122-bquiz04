<h2>第一次購買</h2>
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
		<!-- 因為改轉到api/captcha去處理判別並由ajax前端處理 所以這邊不用打回資料 -->
		<input type="text" name="ans" id="ans">
		<img src="" id="captcha"><button onclick="captcha()">重新產生</button>
			</td>
	</tr>
</table>
<div class="ct">
	<button onclick="login('mem')">確認</button>
</div>
<script>
	captcha(); //要先執行一次 不然一開始畫面不會出來圖型檔喔
	function captcha(){
		$.get("./api/captcha.php",(img)=>{
			// console.log(img)
			$('#captcha').attr('src',img)
		})
	}
	function login(table){
		$.get("./api/chk_ans.php",{ans:$("#ans").val()},(chk)=>{
			if(parseInt(chk)==0){
				alert("驗證碼錯誤，請重新輸入")
			}else{
				$.post("./api/chk_pw.php",{table,acc:$("#acc").val(),pw:$("#pw").val()},(res)=>{
					if(parseInt(res)==0){
						alert("帳號密碼錯誤，請重新輸入")
					}else{
						location.href='index.php';
					}
				})
			}

		})
	}
</script>