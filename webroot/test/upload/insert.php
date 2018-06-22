<!doctype html>
<?php  
header("Content-type:text/html;charset=utf-8");
include"session_check.php";
$lesson=$_POST['select10'];
    $name=$_SESSION['name']; 
$name=iconv("UTF-8","gb2312", $name);
$number=$_SESSION['number'];
$lesson1=$_POST['select11'];
$myfile = fopen("./lesson/$lesson1/student_work/$lesson/$number$name.txt", "a") or die("Unable to open file!");



for($j=0;$j<10;$j++){
	
	$select=$_POST['select'.$j];
	$select1=iconv("UTF-8","gb2312", $_POST['select'.$j]);
	fwrite($myfile, $select1."\r\n");
	echo $select;
}




for($i=1;$i<6;$i++){
	$number1="number".$i;
	$input=iconv("UTF-8","gb2312", $_POST[$number1]);
	
	fwrite($myfile, $input."\r\n");
	echo $input;
}
echo "<script>alert('上传成功'); history.go(-1);</script>";
    //1.接收提交文件的用户  
fclose($myfile);
?>