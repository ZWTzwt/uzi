<!doctype html>
<?php  
header("Content-type:text/html;charset=utf-8");
include"session_check.php";
include_once"../connect_mysql.php";
$lesson=$_POST['select11'];
$number=$_POST['select10'];
$name=$_SESSION['username'];
echo $lesson;
echo $number;
echo $name;


$sql="DELETE FROM `选课表` WHERE 课程代码='$number' and 学生用户名='$name'";
	  
	$result = mysql_query($sql,$conn);
if($result){
		echo "<script> alert('删除成功！');parent.location.href='./student.php'; </script>";
		
	}	
    else{
	echo "<script>alert('删除失败'); history.go(-1);</script>";
	}


?>