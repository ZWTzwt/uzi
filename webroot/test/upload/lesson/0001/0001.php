<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
	<link rel="stylesheet" type="text/css" href="../../lesson.css"/>
</head>
<body>
	<div class="head" onclick="divShow(this);">
		<span id="span1">欢迎使用作业提交系统</span>
		<select id="select1" name="$_SESSION['username']">
			<option value="1"><a href="test/register.html">进入空间没有账号，注册</a></option>
			<option value="2">退出</option>
		</select>	
	</div>
	<div id="body">
	  <div id="userlist">
	   <div id="usericon">
			 
		 </div>
	   <div id="list">   	
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
			  $housework="./housework/$bytes[$j].txt";
			  $k=$j+1;
			  $arr=file_get_contents($housework);
		      
			 
			  echo "<div id='$k' class='housework' style='display:none;'>";
              echo iconv('GBK','UTF-8',  $arr);
			  echo "</div>";
		  }
		  ?>
		  </pre>
	  </div>
	  <div id="notice_upload">
		   <div id="upload">
	<div>
    <form enctype="multipart/form-data" method="post" action="../../uploadprocess.php">  
    <table id="table1">  
    <tr><td align="center" colspan="2"><font style="font-size:20px;font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';">作业上传</font></td></tr>  
	<tr><td>请填写课程名：</td><td><input type="text" name="obj" placeholder="0001" /></td></tr>
	<tr><td>请填写作业名：</td><td><input type="text" name="work" placeholder="day01" /></td></tr>	
    <tr><td>请选择你要上传文件：</td><td><input type="file" name="myfile"/></td></tr>  
    <tr><td><input type="submit" value="上传文件"/></td><td></td></tr>  
    </table>  
    </form>

		
		
	</div>
  </div>
	  </div>
	</div>
	
	<form method="post" action="../../insert.php" id="output">
	<div id="anwser">
		<div id="se">
		<select name="select0" id="select" form="output">
			<option>选择题1</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			</select>
		<select name="select1" id="select" form="output">
			<option>选择题2</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			</select>
		<select name="select2" id="select" form="output">
			<option>选择题3</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			</select>
		<select name="select3" id="select" form="output">
			<option>选择题4</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			</select>
		<select name="select4" id="select" form="output">
			<option>选择题5</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			</select>
		<select name="select5" id="select" form="output">
			<option>选择题6</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			</select>
		<select name="select6" id="select" form="output">
			<option>选择题7</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			</select>
		<select name="select7" id="select" form="output">
			<option>选择题8</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			</select>
		<select name="select8" id="select" form="output">
			<option>选择题9</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			</select>
		<select name="select9" id="select" form="output">
			<option>选择题10</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			</select>
		<select   name="select10" form="output"    style='display:none;'>
			<option id="select0" value="A">A</option>
			</select>
			<select   name="select11" form="output"    style='display:none;'>
			<option  value="0001">A</option>
			</select>
			</div> 
		<div>
			
				<input type="char" required="required"  name="number1" >
				<input type="char" required="required"  name="number2">
				<input type="char" required="required"  name="number3">
				<input type="char" required="required"  name="number4">
				<input type="char" required="required"  name="number5">
				<p><button class="but" type="submit">提交</button></p>
				
				
		
		</div>
		</div>
	</form>
	<script type="text/javascript">
				function divShow(theobj){				
document.getElementById(theobj.id.substring(3)).style.display="block";
					
				
					document.getElementById("select0").value=theobj.id;
}
function flash(){
			history.go(0);
		}
</script>
		
</body>
</html>
