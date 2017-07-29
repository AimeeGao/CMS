<?php
if(!isset($_GET['id'])){
	echo '用户名错误！';
	exit;
}
$id = $_GET['id'];
if(empty($id)){
	echo '用户名不能为空';
	exit;
}
// 获取到用户名且值不为空
$host = 'localhost';
$user_name = 'root';
$password = 1346;

$conn = mysql_connect($host,$user_name,$password);
if(!$conn){
	die("连接数据库失败：".mysql_error());
}
mysql_select_db('test');
$sql = "select * from exercise where id = $id";
$result = mysql_query($sql) OR die("<br/>ERROR:<b>".mysql_error()."</b><br/><br/>有问题的SQL语句：".$sql);
// 判断用户id是否存在于所选的数据库中
if(!$num = mysql_num_rows($result)){ // 出错
	echo "用户名错误！";
	exit;
}

// 删除数据
$sql = "delete from exercise where id = $id"; // 出错
mysql_query($sql) OR die("<br/>ERROR：<b>".mysql_error()."</b><br/><br/>有问题的SQL语句：".$sql);
mysql_close($conn);
echo '数据删除成功，<a href="exercise.php">查看</a>';