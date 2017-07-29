<?php
$host = 'localhost';
$user_name = 'root';
$password = 1346;
$conn = mysql_connect($host,$user_name,$password); // 连接MySQL
if(!$conn){
	die('数据库连接失败：'.mysql_error());
}
mysql_select_db('test');
$sql = 'select id,name,city from users';
$result = mysql_query($sql) OR die('<br/>ERROR:<b>'.mysql_error().'<br/><br/><br/>产生问题的SQL:</b>'.$sql);
if($num = mysql_num_rows($result)){ // 判断SELECT语句查找到的行数
	$row = mysql_fetch_array($result); // mysql_fetch_array()将结果集中的一行作为数组返回
	echo '<pre>';
	print_r($row);
	
}
mysql_close($conn);
