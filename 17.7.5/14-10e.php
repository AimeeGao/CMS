<?php
$host = 'localhost';
$user_name = 'root';
$password = 1346;

// 通过POST方法传入的表单数据
$name = $_POST['user_name'];
$city = $_POST['city'];

if(empty($name) || trim($name) == ''){ // 判断用户名是否为空或者空格
	echo '请填写用户名！<a href="14-9e.html">返回</a>';
	exit;
}
$conn = mysql_connect($host,$user_name,$password);
if(!$conn){
	die('数据库连接失败：'.mysql_error());
}
mysql_select_db('test');
// sql语句发生了改变，插入语句
$sql = "insert into users set id=7,name='".$name."',city='".$city."'"; // 这不是动态的插入数据 , id值是定死的
mysql_query($sql) OR die('ERROR:<b>'.mysql_error().'</b></br><br/>有问题的SQL：'.$sql);
mysql_close($conn);

echo '数据插入成功'.'<a href="14-7e.php">查看数据</a>';