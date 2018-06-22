<!doctype html>
<?php  
global $conn;
$host="sqld-gz.bcehost.com:3306";
$user="bbdc4bc206ec490e982b02841399833e";
$password="02ea296af1994229a0a6686b67dae0a8";
$dbname="rKyYSxRLbHMXLSXVPCiQ";
// 创建连接  
$conn=mysql_connect($host,$user,$password,$dbname);//三个参数分别对应服务器名，账号，密码  
// 检测连接  
if (!$conn) {  
    die("连接服务器失败: " . mysql_connect_error());//连接服务器失败退出程序  
}   
?>