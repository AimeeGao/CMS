<?php
$host = 'localhost';
$user_name = 'root';
$password = 1346;
$conn = mysql_connect($host,$user_name,$password);
if(!$conn){
	die('数据库连接失败：'.mysql_error());
}
mysql_select_db('test');
$sql = 'select id,name,city from users';
$result = mysql_query($sql) OR die("<br/>ERROR:<b>".mysql_error()."</b><br/><br/>有问题的SQL：<br/>".$sql) ;
if($num = mysql_num_rows($result)){ // 判断SELECT语句查找到的行数
	echo '<pre>'; // 格式化输出
	while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
		print_r($row);  // 输出每行数据
	}
}
mysql_close($conn);