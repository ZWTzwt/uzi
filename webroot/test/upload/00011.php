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
    <h4 class="logo">GRID</h4>
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
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla </p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla</p>
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

              echo "<li><a  id='$file' class='mainTtem' title=Link onclick='divShow(this);'>";
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
			  $k=$j+1;
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
				   echo "<div id='$file1' class='$k' name='$k' style='display:none;' onclick='Show(this);'>";
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
			   echo "<div id='$bytes1[$j]1' class='$m' style='display:none;'>";
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
			 <form method="post" action="../../insert1.php" >
				 <p id="pp">       </p>
			  <input type="int" required="required" id="input1"  name="number1" >
			  <select   name="select12"     style='display:none;'>
			<option id="select" value="A">A</option>
			</select>
			  <select   name="select10"     style='display:none;'>
			<option id="select0" value="A">A</option>
			</select>
			<select   name="select11"     style='display:none;'>
			<option  value="0001">A</option>
			</select> 
			<button  id="chuan" class="button" type="submit">提交</button>
			</form>
			 </div>
		 </div>
		 <div id="upload">
	<div >
    <form id="wenjian" enctype="multipart/form-data" method="post" action="../../teacher_uploadprocess.php">  
    <table id="table1">
	<tr><td align="center" >作业发布</td></tr>
	<tr><td>作业名：</td><td><input type="text" name="work" placeholder="day01" /></td></tr>	
    <tr><td>选择文件：</td><td><input type="file" name="myfile"/></td></tr>  
    <tr><td><input type="submit" value="上传文件"/></td><td></td></tr>  
    </table>  
    </form>				
  </div>
			 
			 </div>
		 </div>
  <!-- Footer Section -->
  <footer id="contact">
    <p class="hero_header">GET IN TOUCH WITH ME</p>
    <div class="button">EMAIL ME </div>
  </footer>
  <!-- Copyrights Section -->
  <div class="copyright">&copy;2015 - <strong>GRID</strong></div>
</div>
<!-- Main Container Ends -->
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