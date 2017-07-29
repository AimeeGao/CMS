<?php
// 为用户信息列表添加“删除”链接 与“添加”链接类似
$host= 'localhost';
$user_name = 'root';
$password = 1346;

$conn = mysql_connect($host,$user_name,$password);
if(!$conn){
	die('连接数据库失败：'.mysql_error());
}
mysql_select_db('test');
$sql = "select id,name,city from users";
$result = mysql_query($sql) OR die("<br/>ERROR:<b>".mysql_error()."</b><br/><br/>有问题的SQL：".$sql);

// 在执行完SQL语句后，书写HTML代码
?>

<html>
<head>
<meta charset="UTF-8"/>
<title>14-12n.php</title>
<script type="text/javascript"></script>
</head>
<body>
	<form name="form" method="post">
		<table border="0" width="75%" cellpadding="0" cellspacing="2" bgcolor="#7B7B84">
			<tr bgcolor="#8BBCC7">
				<td height="33"><div align="center"><strong>用户ID</strong></div></td>
				<td height="33"><div align="center"><strong>用户名称</strong></div></td>
				<td height="33"><div align="center"><strong>来自城市</strong></div></td>
				<td height="33"><div align="center"><strong>操作</strong></div></td>
			</tr>
			<?php 
			if($num = mysql_num_rows($result)){
				while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
			?>
				<tr bgcolor="#FFF">
					<td height="22" align="right"><?php echo $row['id'];?> &nbsp;</td>
					<td height="22" align="right"><?php echo $row['name'];?> &nbsp;</td>
					<td height="22" align="right"><?php echo $row['city'];?> &nbsp;</td>
					<td height="22"> &nbsp; <a onclick="javascript:if(confirm('确定要删除用户信息吗？')) return ture; else return false;" href="14-13.php?id=<?php echo $row['id'];?>">删除</a> &nbsp; </td>
				</tr>
			<?php 
				}
			}
			
			mysql_close($conn);
			?>
			
			
			
			
</table>
</form>
</body>
</html>




