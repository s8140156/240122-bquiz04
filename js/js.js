// JavaScript Document
function lof(x)
{
	location.href=x
}

//因為有好幾個功能會使用到del button 讓同一程式 外部引入到頁面去
function del(table,id){
	$.post("./api/del.php",{table,id},()=>{
		location.reload();
	})
}