<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
	<link rel="stylesheet" type="text/css" href="../../teacher.css"/>
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
		session_start();
				$_SESSION['lessonnumber']="0001";
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
				   echo iconv('GBK','UTF-8',$file1);
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
		  
	  </div>
		
	</div>
	 <div id="upload">
	<div>
    <form id="wenjian" enctype="multipart/form-data" method="post" action="../../teacher_uploadprocess.php">
      <div >
    <table id="table1">
	<tr><td></td><td  >作业发布</td></tr>
	<tr><td>作业名：</td><td><input type="text" name="work" placeholder="day01" /></td></tr>	
    <tr><td>选择文件：</td><td><input type="file" name="myfile"/></td></tr>  
		<tr><td><input type="submit" value="上传文件"/></td><td></td></tr>
    </table> 			
  </div> 
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

}
		function Show(theobj){
			document.getElementById(theobj.id+"1").style.display="block"
			
		}
		function flash(){
			history.go(0);
		}
</script>
		
</body>
</html>