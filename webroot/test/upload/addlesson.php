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


$sql="insert into 选课表(课程代码, 学生用户名, 课程名) values('$number','$name','$lesson')";
	  
	$result = mysql_query($sql,$conn);
if($result){
		echo "<script> alert('添加成功！');parent.location.href='./all_lessons.php'; </script>";
		
	}	
    else{
	echo "<script>alert('您已添加此课程'); history.go(-1);</script>";
	}


?>