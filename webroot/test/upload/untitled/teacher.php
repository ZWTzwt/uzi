<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>作业提交系统</title>
	<link rel="stylesheet" type="text/css" href="user.css"/>
</head>
<body>
	<div class="head">
		<span id="span1">欢迎使用作业提交系统</span>
		<select id="select1" name="$_SESSION['username']">
			<option value="1"><a href="test/register.html">进入空间没有账号，注册</a></option>
			<option value="2">退出</option>
		</select>	
	</div>
<div>
     <div id="userlist">
	   <div id="usericon">
			 
		 </div>
	   <div id="list">
		<ul>
       <li><a href="#" title="账号管理">账号管理</a> </li>
       <li><a href="#" title="课程">课程</a></li>
       <li><a href="#" title="云盘存储">云盘存储</a></li>
        </ul>
	   </div>
  </div>
	<div id="lessons">
		<div class="head">
		 <span id="mylesson">我的课程</span>
		</div>
		<div>
	<?php
	include_once"session_check.php";
	include_once"../connect_mysql.php";
	$username=$_SESSION['username'];
	$sql = "select 课程代码 from lesson where 教师用户名='$username'";  
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
			$teacher=$result_arr[$length]+"o";
			echo "<div class=Mylesson>";
			echo "<a class=a href=./lesson/$result_arr[$length]/$teacher.php style=display:block;width:148px;height:148px;></a>";
			echo "<img src=".$arr1['图片地址']."/><br>";
			echo "<span>".$result_arr[$length]."</span><br>";
			echo "<span>".$arr1['课程名']."</span><br>";
			echo "<span>".$arr1['授课专业']."</span><br>";
			echo "<span>".$arr1['授课教师']."</span><br>";
			echo "<span>".$arr1['授课地点']."</span><br>";
			echo "</div>";
			}
	}
?>
		</div>
    </div>
</div>
</body>
</html>