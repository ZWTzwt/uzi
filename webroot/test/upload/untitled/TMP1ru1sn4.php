<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
	<link rel="stylesheet" type="text/css" href="file:///F|/teacher.css"/>
</head>
<body>
	<div class="head" onclick="divShow(this);">
		<span id="span1">欢迎使用作业提交系统</span>
		<select id="select1" name="$_SESSION['username']">
			<option value="1"><a href="test/register.html">进入空间没有账号，注册</a></option>
			<option value="2">退出</option>
		</select>	
	</div>
	<div id="worklist">
		<?php	
		   $i=0;
		   $sdh=opendir('./student_work/');
		   while($file=readdir($sdh)){
			   if($file!="."and $file!=".."){
				   $bytes[$i]=$file;
				   echo "<div id='$file' class='mainItem' onclick='divShow(this);'>";
				   echo "$file";
				   echo "</div>";
				   $i+=1;
			   }   
		   }		   
		   ?>
		
		</div>
	<div id="body">
	  <div id="userlist">
	   <div id="usericon">
			 
		 </div>
	   <div id="list">   	
			<?php	
		   $length=count($bytes);
		  for($j=0;$j<$length;$j++){
			  $o="./student_work/$bytes[$j]/";
			  $k=$j+1;
			$sdh1=opendir($o);
			     
		   while($file1=readdir($sdh1)){
			   if($file1!="."and $file1!=".."){
				   $bytes1[$j]=$file1;
				   echo "<div id='$file1' class='$k' name='$k' style='display:none;' onclick='Show(this);'>";
				   echo "$file1";
				   echo "</div>";
			   }  
		   }	  
		  }
		   ?>
	   </div>
		  <div>
			  <span id="flash" onclick="flash();">刷新</span>
			  
			  </div>
      </div>
	  <div id="workarea">
		  <pre>
		  <?php
    header("Content-type:text/html;charset=utf-8");

	   	
		   $length=count($bytes);
		  for($j=0;$j<$length;$j++){
			  $o="./student_work/$bytes[$j]/";
			  $k=$j+1;
			$sdh1=opendir($o);
			     
		   while($file1=readdir($sdh1)){
			   if($file1!="."and $file1!=".."){
				   $bytes1[$j]=$file1;
				   
				   
				   $housework="./student_work/$bytes[$j]/$bytes1[$j]";
			  $k=$j+1;
			  $arr=file_get_contents($housework);
		      
			  echo "<div id='$bytes1[$j]1' class='housework' style='display:none;'>";
              echo iconv('GBK','UTF-8',  $arr);
			  echo "</div>";
				  
			   }  
		   }

			  
			  
		  }
		   
		   ?>
	  

		  </pre>
	  </div>
	  <div id="notice">
		  <form method="post" action="file:///F|/insert1.php" >
			  <input type="int" required="required"  name="number1" >
			  <select   name="select12"     style='display:none;'>
			<option id="select" value="A">A</option>
			</select>
			  <select   name="select10"     style='display:none;'>
			<option id="select0" value="A">A</option>
			</select>
			<select   name="select11"     style='display:none;'>
			<option  value="0001">A</option>
			</select>
			  
			  <p><button class="but" type="submit">提交</button></p>
			  </form>
	  </div>
		
	</div>
	 <div id="upload">
	<div>
    <form enctype="multipart/form-data" method="post" action="file:///F|/uploadprocess.php">  
    <table id="table1">  
    <tr><td align="center" colspan="2"><font style="font-size:20px;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';">作业上传</font></td></tr>  
	<tr><td>请填写课程名：</td><td><input type="text" name="obj" placeholder="0001" /></td></tr>
	<tr><td>请填写作业名：</td><td><input type="text" name="work" placeholder="day01" /></td></tr>	
    <tr><td>请填写用户名：</td><td><input type="text" name="username" placeholder="201412312135张三"/></td></tr> 
    <tr><td>请选择你要上传文件：</td><td><input type="file" name="myfile"/></td></tr>  
    <tr><td><input type="submit" value="上传文件"/></td><td></td></tr>  
    </table>  
    </form>

		
		
	</div>
  </div>
	<script type="text/javascript">
		function divShow(theobj){
					var x = document.getElementsByClassName(theobj.id.substring(3));
                   var i;
                   for (i = 0; i < x.length; i++) {
                  x[i].style.display="block";
                  }
			
document.getElementById("select0").value=theobj.id;
}
		function Show(theobj){
			document.getElementById(theobj.id+"1").style.display="block";
			
			document.getElementById("select").value=theobj.id.substring(0,12);
			
		}
		function flash(){
			history.go(0);
		}
</script>
		
</body>
</html>