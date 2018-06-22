<!doctype html>
<?php  
header("Content-type:text/html;charset=utf-8");
include"session_check.php";
include_once"../connect_mysql.php";
$score=$_POST['number1'];
$lesson=$_POST['select10'];
$lesson1=$_POST['select11'];
$number=$_POST['select12'];
echo $number;
echo $lesson;
echo $lesson1;
echo $score;
 if($number=="A"){
	 echo "<script> alert('请选择作业');history.back();</script>";
 }else{
	 $sql1="select score from housework where number='$number' and work='$lesson' and 课程代码='$lesson1'";
	 $result1=mysql_query($sql1,$conn);
	 $score1=mysql_fetch_row($result1);
	 echo $score1[0];
	 $score+=$score1[0];
	$sql = "UPDATE housework
        SET score='$score'
        WHERE number='$number' and work='$lesson' and 课程代码='$lesson1'";
	$result = mysql_query($sql,$conn);
	 if($result){
		echo "<script> alert('批改成功！学生成绩为$score');window.close();</script>"; 
	 }

 }

?>