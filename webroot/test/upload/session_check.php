<!doctype html>
<?php
header("Content-type:text/html;charset=utf-8");
session_start();
if(!isset($_SESSION['username'])){
	echo "<script> alert('请登陆！');parent.location.href='../../index.html'; </script>";
	
}
?>