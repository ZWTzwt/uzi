<!doctype html>
<?php
header("Content-type:text/html;charset=utf-8");
include_once"connect_mysql.php";
$username=$_POST["username"];
$password=$_POST["password"];
$password2=$_POST["password2"];
$usertype=$_POST["radio1"];
$name=$_POST["name"];
$number=$_POST["number"];
if($password==$password2){
	$sql="insert into loadin(usertype,username,password,name,number) values('$usertype','$username','$password2','$name','$number')";
    $result=mysql_query($sql,$conn);
	if($result){
		echo "<script> alert('注册成功！');parent.location.href='upload/$usertype.php'; </script>";
		session_start();
				$_SESSION['username']=$_POST["username"];
				$_SESSION['password']=$_POST["password"];
	}	
    else{
	echo "<script>alert('用户名已存在'); history.go(-1);</script>";
	}
} 
else{
	echo "<script>alert('输入错误，请重新输入'); history.go(-1);</script>";
}
?>