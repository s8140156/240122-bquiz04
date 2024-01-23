<?php
if(!isset($_SESSION['mem'])){ //因為如果存在 要做很多事, 所以反過來先寫 else後面再去執行落落長
	to('?do=login');
}

?>