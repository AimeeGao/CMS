<?php
$host = 'localhost';
$user_name = 'root';
$password = 1346;

$name = $_POST['user_name'];
$city = $_POST['city'];

if(empty($name) || trim($name) == ''){ // 判断用户名是否为空或是空格
	echo '请输入用户名！<a href="14-9.html">返回</a>';
	exit;
}

$conn = mysql_connect($host,$user_name,$password);
if(!$conn){
	die("连接数据库失败:".mysql_error());
}
mysql_select_db('test');
$sql = "insert into test set id=NUll, name='".$name."',city='".$city."'";
mysql_query($sql) OR die('<br/>ERROR:<b>'.mysql_error().'<b/><br/><br/>有问题的SQL：'.$sql);
mysql_close($conn);

echo '数据插入成功，<a href="14-7e.php">查看</a>';