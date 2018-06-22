<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Light Theme</title>
<link href="../../simpleGridTemplate.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Main Container -->
<div class="container"> 
  <!-- Header -->
  <header class="header">
    <h4 class="logo">欢迎使用作业提交系统</h4>
  </header>
  <!-- Hero Section -->
  <section class="intro">
    <div class="column">
			<?php
		   include_once"../../session_check.php";
	include_once"../../connect_mysql.php";
		$c=$_SESSION['name'];
		$_SESSION['lessonnumber']="0001";
   		echo "<h3>'$c'</h3>";
		   ?>
      <img src="../../images/profile.png" alt="" class="profile"> </div>
    <div class="column">
       <p>凡吾校师生定当：
    修身养德，学做真人；崇尚科学，追求真理；师法自然，恪守真实。
    学精业广，敬畏为基；乐群笃行，敬尊为怀；经世致用，敬崇为宗。 </p>
      <p>1.修身：《大学》：“格物,致知,正心,诚意,修身,齐家,治国,平天下”；
    2．学做真人：陶行知名言：“千教万教教人求真,千学万学学做真人”；
    3．敬：“所谓敬者，主之一谓敬”；  4．敬业乐群：《礼记》：“三年视敬业乐群”；</p>
    </div>
  </section>
  <!-- Stats Gallery Section -->
	 <div id="content">
  <section class="sidebar"> 
      <!-- This adds a sidebar with 1 searchbox,2 menusets, each with 4 links -->
      <input type="text"  id="search" value="">
      <div id="menubar">
        <nav class="menu">
          <h2><!-- Title for menuset 1 -->作业 </h2>
          <hr>
          <ul>
			  
			  	<?php	
		   $i=0;
		   $sdh=opendir('./student_work/');
		   while($file=readdir($sdh)){
			   if($file!="."and $file!=".."){
				   $bytes[$i]=$file;

              echo "<li><a  id='$i$file' class='mainTtem' title=Link onclick='divShow(this);'>";
			  echo "$file";
			  echo "</a></li>";
				   $i+=1;
			   }   
		   }		   
		   ?>
			 
			  
            <!-- List of links under menuset 1 -->
          </ul>
        </nav>
        <nav class="menu">
          <h2>学生提交的作业&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;成绩 </h2>
          <!-- Title for menuset 2 -->
          <hr>
          
			<?php	
		   $length=count($bytes);
		  for($j=0;$j<$length;$j++){
			  $o="./student_work/$bytes[$j]/";
			$sdh1=opendir($o);
			     
		   while($file1=readdir($sdh1)){
			   if($file1!="."and $file1!=".."){
				   $bytes1[$j]=$file1;
				   $number=substr($file1,0,12);
				   include_once"../../connect_mysql.php";
				   $sql = "select score from housework where number='$number' and work='$bytes[$j]' and 课程代码='0001'";
	               $result = mysql_query($sql,$conn);
				   if($result){
					   $score=mysql_fetch_row($result);
				   }else{
					   $score[0]="00";
				   }
				   echo "<div id='$file1' class='$j' name='$j' style='display:none;' onclick='Show(this);'>";
				   echo iconv('GBK','UTF-8',$file1)."&nbsp;&nbsp;$score[0]";
				   echo "</div>";
			   }  
		   }	  
		  }
		   ?>  
          
        </nav>
      </div>
    </section>
		 <div id="shangchuanwenjian">
		 <div id="workarea">
		  <?php 
		   header("Content-type:text/html;charset=utf-8");

	   	
		   $length=count($bytes);
		  for($j=0;$j<$length;$j++){
			  $o="./student_work/$bytes[$j]/";
			  $k=$j+1;
			$sdh1=opendir($o);
			     
		   while($file1=readdir($sdh1)){
			   $m=20;
			   if($file1!="."and $file1!=".."){
				   $bytes1[$j]=$file1;
				   $housework="./student_work/$bytes[$j]/$bytes1[$j]";
			  $k=$j+1;
			  $arr=file_get_contents($housework);
				   $m+=1;
			 echo "<pre>";
			   echo "<div id='$bytes1[$j]1' class='abc' name='abc' style='display:none;'>";
              echo iconv('GBK','UTF-8',  $arr);
			  echo "</div>";
			  echo "</pre>";
		  }
		   }
		  }
		  ?>
			 <div id='0' class='test' style='display:none;'>
				 </div>
	  </div>
		 <div id="shang">
			 <form method="post" action="../../insert1.php" target="_blank" >
				 <p id="pp">       </p>
			  <input type="int" required="required" id="input2"  name="number1" >
			  <select   name="select12"     style='display:none;'>
			<option id="select" value="A">A</option>
			</select>
			  <select   name="select10"     style='display:none;'>
			<option id="select0" value="A">A</option>
			</select>
			<select   name="select11"     style='display:none;'>
			<option  value="0001">A</option>
			</select> 
			<button  id="chuan" class="button" type="submit" onclick='flash();'>提交</button>
			</form>
			 </div>
		 </div>
		 <div id="upload">
	<form id="wenjian" enctype="multipart/form-data" method="post" action="../../teacher_uploadprocess.php">
      <div >
    <table id="table1">
	<tr><td></td><td  >作业发布</td></tr>
	<tr><td>作业名：</td><td><input type="text" name="work" placeholder="day01" /></td></tr>	
    <tr><td>选择文件：</td><td><input type="file" name="myfile"/></td></tr>  
    </table> 			
  </div>
		<div>
		<select name="select0" id="select" >
			<option>选择题1</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value=""></option>
			</select>
		<select name="select1" id="select" >
			<option>选择题2</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value=""></option>
			</select>
		<select name="select2" id="select" >
			<option>选择题3</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value=""></option>
			</select>
		<select name="select3" id="select" >
			<option>选择题4</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value=""></option>
			</select>
		<select name="select4" id="select" >
			<option>选择题5</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value=""></option>
			</select>
		<select name="select5" id="select" >
			<option>选择题6</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value=""></option>
			</select>
		<select name="select6" id="select" >
			<option>选择题7</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value=""></option>
			</select>
		<select name="select7" id="select" >
			<option>选择题8</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value=""></option>
			</select>
		<select name="select8" id="select" >
			<option>选择题9</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value=""></option>
			</select>
		<select name="select9" id="select" >
			<option>选择题10</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value=""></option>
			</select>
		<select   name="select10"     style='display:none;'>
			<option id="select0" value="A">A</option>
			</select>
			<select   name="select11"     style='display:none;'>
			<option  value="0001">A</option>
			</select> 
			<input id="input1" type="char" required="required" placeholder="填空1" name="number1" >
			<input id="input1" type="char" required="required" placeholder="填空2" name="number2">
			<input id="input1" type="char" required="required" placeholder="填空3" name="number3">
			<input id="input1" type="char" required="required" placeholder="填空4" name="number4">
			<input id="input1" type="char" required="required" placeholder="填空5" name="number5">
			<p><button class="button" type="submit">提交</button></p>
				

		</div>
	</form>
			
			</div>
		</form>		 
			 </div>
		 </div>
  <!-- Footer Section -->
  <footer id="contact">
    <p class="hero_header">退出该页面</p>
    <div  class="button" onclick='quit();'>退出</div>
  </footer>
  <!-- Copyrights Section -->
  <div class="copyright">&copy;2015 - <strong>GRID</strong></div>
</div>
<!-- Main Container Ends -->
	<script type="text/javascript">
		function divShow(theobj){
					var x = document.getElementsByClassName(theobj.id.substring(0,1));
                   var i;
                   for (i = 0; i < x.length; i++) {
                  x[i].style.display="block";
                  }
			
document.getElementById("select0").value=theobj.id.substring(1);
}
		function Show(theobj){
			
			document.getElementById(theobj.id+"1").style.display="block";
			document.getElementById("select").value=theobj.id.substring(0,12);
			
		}
		function flash(){
			var x = document.getElementsByClassName("abc");
                   var i;
                   for (i = 0; i < x.length; i++) {
                  x[i].style.display="none";
                  }
			
		}
		function quit(){
			window.close();
		}
</script>
</body>
</html>