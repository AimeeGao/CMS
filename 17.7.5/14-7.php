<?php
$host = 'localhost';
$user_name = 'root';
$password = 1346;
$conn = mysql_connect($host,$user_name,$password);
if(!$conn){
	die('数据库连接失败：'.mysql_error());
}
mysql_select_db('test');
$sql = 'select id,name,city from users';  // auto_increment
$result = mysql_query($sql) OR die("<br/>ERROR:<b>".mysql_error()."</b><br/><br/>有问题的SQL：".$sql);
?>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>在HTML文档中嵌入PHP程序显示表中数据</title>
</head>
<body>
	<form>
	 <table border="0" cellpadding="0" cellspacing="1" width="75%" bgcolor="#7B7B84">
	 	<tr bgcolor="#8BBCC7">
	 		<td height="33"><div align="center"><strong>用户ID</strong></div></td>
	 		<td><div align="center"><strong>用户名称</strong></div></td>
	 		<td><div align="center"><strong>来自城市</strong></div></td>
	 	</tr>
	 
	 <?php 
	 if($num = mysql_num_rows($result)){
	while($row=mysql_fetch_array($result,MYSQL_ASSOC)){
	 ?>
		<tr bgcolor="#FFFFFF">
			<td height="22" align="right"><?php echo $row['id']?></td>
			<td height="22" align="right"><?php echo $row['name']?></td>
			<td height="22" align="right"><?php echo $row['city']?></td>
		</tr>
		<?php
	}
}
		?>
 
	 </table>
	</form>
</body>

</html>

