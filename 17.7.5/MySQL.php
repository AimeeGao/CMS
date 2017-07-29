<?php
$host = 'localhost'; // 定义服务器
$user_name = 'root'; // 定义用户名
$password = 1346; // 定义密码

$conn = mysql_connect($host,$user_name,$password);  // 连接MySQL
if(!$conn){
	die('数据库连接失败：'.mysql_error());  // die() 函数输出一条消息，并退出当前脚本。
}
echo '数据库连接成功！';

if(mysql_close($conn)){   // 关闭打开的连接
	echo '<br/>.......<br/>';
	echo '到数据库的连接已成功关闭';
}