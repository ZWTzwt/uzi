<!doctype html>
<?php
header("Content-type:text/html;charset=utf-8"); 
        
        $username = $_POST["username"];  
        $password = $_POST["password"];  
        $usertype=$_POST["radio1"];     
            include_once"connect_mysql.php";
			$sql = "select password,usertype from loadin where username = '$_POST[username]' and password = '$_POST[password]'";  
            $result = mysql_query($sql,$conn);  
            $num = mysql_num_rows($result);
			$row = mysql_fetch_array($result);  //将数据以索引方式储存在数组中           
            if($num && strcmp($usertype,$row[1])==0)  { 
				session_start();
		        $_SESSION['username']=$_POST["username"];
		        $_SESSION['password']=$_POST["password"];
                echo "<script> alert('登陆成功！');parent.location.href='upload/$row[1].php'; </script>";
				
			}	
             else  {  
                echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";  
             }          
     
?>