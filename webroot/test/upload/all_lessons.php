<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>作业提交系统</title>
<link href="all.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Main Container -->
<div class="container"> 
  <!-- Header -->
  <header class="header">
    <h4 class="logo">欢迎使用作业提交系统</h4>
  </header>
  <!-- Hero Section -->
  <!-- Stats Gallery Section -->
  <div class="gallery">
	  	<?php
	include_once"session_check.php";
	include_once"../connect_mysql.php";
	$username=$_SESSION['username'];
	$sql = "select 课程代码 from lesson";  
	$result = mysql_query($sql,$conn);
	$result_arr=array();
	while($arr=mysql_fetch_row($result)){
		list($a)=$arr;
        $result_arr[] = $a;
    }
	for($length=0;$length<count($result_arr);$length++){
		$sql1="select 授课教师,授课地点,授课专业,课程名,图片地址 from lesson where 课程代码='$result_arr[$length]'";
		$result1=mysql_query($sql1);
		while($arr1=mysql_fetch_array($result1)){
			echo "<div class=thumbnail>";
			echo "<a href=><img src=images/bkg_06.jpg alt='' width=314.467 class=cards/></a>";
			echo "<h4>".$arr1['课程名']."</h4>";
			echo "<p class=tag>".$result_arr[$length]."</p>";
			echo "<p class=text_column>".$result_arr[$length].$arr1['授课专业'].$arr1['授课教师'].$arr1['授课地点']."</p>";
			echo "<form method=post action=addlesson.php id=add>";
			echo "<select   name=select10    style='display:none;'>";
			echo "<option  value=".$result_arr[$length].">A</option>";
			echo "</select>";
			echo "<select   name=select11    style='display:none;'>";
			echo "<option  value=".$arr1['课程名'].">A</option>";
			echo "</select>";
			echo "<div ><button class=button type=submit>添加</button> </div>";
			echo "</form>";
			echo "</div>";
			}
	}
	
?>
  </div>

  <!-- Footer Section -->
  <footer id="contact">
    <div class="button"><a href="student.php">返回 </div>
  </footer>
  <!-- Copyrights Section -->
</div>
<!-- Main Container Ends -->
</body>
</html