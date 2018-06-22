<!doctype html>
<?php  
header("Content-type:text/html;charset=utf-8");
include"session_check.php";
    //1.接收提交文件的用户  
$work1=$_POST['obj'];

    $name=$_SESSION['name']; 
$name=iconv("UTF-8","gb2312", $name);
$number=$_SESSION['number'];
    
$work=$_POST['work'];     
    //获取文件的大小  
    $file_size=$_FILES['myfile']['size'];  
    if($file_size>2*1024*1024) {  
        echo "文件过大，不能上传大于2M的文件";  
        exit();  
    }  
  
    $file_type=$_FILES['myfile']['type'];   
    if($file_type!="text/plain" ) {  
        echo "文件类型只能为text格式";  
        exit();  
    }
    echo $file_type;  
    //判断是否上传成功（是否使用post方式上传）  
    if(is_uploaded_file($_FILES['myfile']['tmp_name'])) {  
         $result=move_uploaded_file($_FILES['myfile']['tmp_name'],"./lesson/"."$work1"."/student_work/"."$work/"."$number$name.txt");  
		echo "<script>alert('上传成功'); history.go(-1);</script>";
    } else {  
        echo "<script>alert('上传失败'); history.go(-1);</script>"; 
    } 
?>