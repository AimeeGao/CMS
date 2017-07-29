<?php
// 在PHP中删除数据库数据
if(!isset($_GET['id'])){
	echo '参数错误'; // 因为14-13n.php是个跳转页面，所以要先判断是否获取到id值
	exit;
}
// 若获取到id值
$id = $_GET['id'];
// 判断获取到的id是否为空
if(empty($id)){
	echo '用户ID不能为空！';
	exit;
}

// 获取到id值且不为空
$host = 'localhost';
$user_name = 'root';
$password = 1346;

$conn = mysql_connect($host,$user_name,$password);
if(!$conn){
	die('连接数据库失败：'.mysql_error());
}
mysql_select_db('test');
// 先判断获取到的id是否在存在于所选的数据库中
$sql = "select * from users where id = $id";
$result = mysql_query($sql) OR die("<br/>ERROR:<b>".mysql_error()."</b><br/><br/>有问题的SQl：".$sql);
if(!mysql_num_rows($result)){
	echo '用户ID错误！';
	exit;
}

// 删除用户数据
$sql = "delete from users where id=$id";
mysql_query($sql) OR die("<br/>ERROR:<b>".mysql_error()."</b><br/>有问题的SQL：".$sql);
mysql_close($conn);

echo '数据删除成功，<a href="14-12n.php">查看</a>';

