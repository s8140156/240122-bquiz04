<?php
session_start();
// $_GET['ans'];

echo ($_SESSION['ans']==$_GET['ans'])?1:0;

?>