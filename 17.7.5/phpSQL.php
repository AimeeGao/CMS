<?php
$host = 'localhost';
$user_name = 'root';
$password = 1346;
$conn = mysql_connect($host,$user_name,$password);
if(!$conn){
	die('数据库连接失败:'.mysql_error());
}
mysql_select_db('test'); // 选择数据库
$sql = 'select id,name,city from users';
$result = mysql_query($sql); // 获取查询结果
echo $result;
echo '<br/>';

if($result){
	echo 'SQL语句：'.$sql.'<br/>已成功执行！';
	$num = mysql_num_rows($result); // 调用函数mysql_num_row()获得SELECT语句查询结果的行数
	echo '<br/>该SQL语句查询到<b>'.$num.'</b>行数据';
}
mysql_close($conn);
